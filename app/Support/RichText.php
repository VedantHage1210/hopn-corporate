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

    /**
     * Turn paragraphs that are just "Label: https://link" (one per line) into proper action buttons,
     * so plain URLs in admin-written copy ("Book a call: https://...") read as designed calls to action.
     * Paragraphs that contain anything else are left untouched.
     */
    public static function actionLinks(string $html): string
    {
        $arrow = '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>';
        $line  = '/^\s*([^<>:]{3,140}?):\s*<a\s[^>]*href="(https?:\/\/[^"]+)"[^>]*>[^<]*<\/a>\s*$/iu';

        return (string) preg_replace_callback('/<p>(.*?)<\/p>/isu', function ($m) use ($line, $arrow) {
            $parts = preg_split('/<br\s*\/?>\s*/iu', trim($m[1]));
            $links = [];
            foreach ($parts as $part) {
                if (trim($part) === '') {
                    continue;
                }
                if (!preg_match($line, $part, $mm)) {
                    return $m[0];
                }
                $links[] = [trim($mm[1]), html_entity_decode($mm[2], ENT_QUOTES)];
            }
            if (!$links) {
                return $m[0];
            }
            $out = '<div class="hopn-doc-actions">';
            foreach ($links as [$label, $url]) {
                $event = str_contains($url, 'meet.ebada.de') ? ' data-hopn-event="Book Call"' : '';
                $out .= '<a class="hopn-doc-action" href="' . e($url) . '" target="_blank" rel="noopener noreferrer"' . $event . '><span>' . $label . '</span>' . $arrow . '</a>';
            }

            return $out . '</div>';
        }, $html);
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
