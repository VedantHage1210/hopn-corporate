<?php

namespace App\Support;

use League\CommonMark\GithubFlavoredMarkdownConverter;

/**
 * Turns admin-entered body text (plain text or light Markdown such as
 * "## Heading", "**bold**", "1. step", "- item") into structured sections
 * so detail pages read as designed content instead of one long paragraph.
 */
class RichText
{
    /** Render a markdown fragment to safe HTML. Raw HTML in the source is stripped. */
    public static function html(?string $markdown): string
    {
        $markdown = trim((string) $markdown);
        if ($markdown === '') {
            return '';
        }

        // Legacy content written as HTML (e.g. from a rich-text editor): keep it, but only safe tags.
        if (preg_match('/<(p|h[1-6]|ul|ol|li|div|br|strong|em|blockquote|table)\b/i', $markdown)) {
            return self::sanitizeHtml($markdown);
        }

        $converter = new GithubFlavoredMarkdownConverter([
            'html_input'         => 'strip',
            'allow_unsafe_links' => false,
            'renderer'           => ['soft_break' => "<br>\n"],
        ]);

        return (string) $converter->convert($markdown);
    }

    /**
     * Split a body into an optional lead plus "##" sections.
     *
     * @return array{lead: string, sections: array<int, array{title: string, kind: string, html: string}>}
     */
    public static function sections(?string $markdown): array
    {
        $markdown = str_replace(["\r\n", "\r"], "\n", trim((string) $markdown));
        $lead = '';
        $sections = [];

        if ($markdown === '') {
            return ['lead' => '', 'sections' => []];
        }

        $parts = preg_split('/^##\s+(.+?)\s*$/m', $markdown, -1, PREG_SPLIT_DELIM_CAPTURE);

        // $parts = [preamble, title1, body1, title2, body2, ...]
        $lead = self::html($parts[0] ?? '');

        for ($i = 1; $i < count($parts); $i += 2) {
            $title = trim(preg_replace('/[*_`#]/', '', $parts[$i]));
            $bodyMd = $parts[$i + 1] ?? '';
            $html = self::html($bodyMd);

            $kind = 'text';
            if (preg_match('/^\s*(\d+[.)]\s)/m', $bodyMd)) {
                $kind = 'steps';
            } elseif (preg_match('/^\s*[-*+]\s/m', $bodyMd)) {
                $kind = 'list';
            }

            $sections[] = ['title' => $title, 'kind' => $kind, 'html' => $html];
        }

        return ['lead' => $lead, 'sections' => $sections];
    }

    /** Allow-list sanitiser for HTML bodies: no scripts, no inline handlers, no javascript: links. */
    public static function sanitizeHtml(string $html): string
    {
        $allowed = '<p><br><strong><b><em><i><u><a><ul><ol><li><h2><h3><h4><blockquote><table><thead><tbody><tr><th><td><code><pre><hr><span>';
        $html = strip_tags($html, $allowed);
        $html = preg_replace('/\s+on[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $html);
        $html = preg_replace('/\s+style\s*=\s*("[^"]*"|\'[^\']*\')/i', '', $html);
        $html = preg_replace('/href\s*=\s*("|\')\s*javascript:[^"\']*("|\')/i', 'href="#"', $html);

        return (string) $html;
    }
}
