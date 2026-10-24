# HOPn design system (public website)

Purpose: the site should read like a European research and implementation company, not an AI product.
The tokens below are defined once in `resources/views/components/layouts/public.blade.php` (`:root`).

## Rules
- One accent colour: `--hopn-accent` (#245B78). No purple/blue gradients, no glows, no glassmorphism.
- One text colour (`--hopn-ink`), one muted colour (`--hopn-ink-muted`), one hairline colour (`--hopn-line`).
- One font family per script: Inter (Latin) and Cairo (Arabic), both self-hosted from `/public/fonts`.
- Spacing on a 4px grid (`--hopn-space-*`). Radius: 6 / 8 / 12px.
- Buttons: primary = filled accent, secondary = white with accent outline. No lift or glow on hover.
- No emoji, no letter badges, no stock imagery. Icons only where they help, one line-icon family.
- Every item that appears in a list carries a plain label (for example Concept / Pilot / Live, Press release, Study), as seen on fraunhofer.de and rolandberger.com.
- Claims need a source the founder can show. If unsure, hide the section.

## Reference notes (what was studied and what it implies)
- appliedai.de, unternehmertum.de, fortiss.org, fraunhofer.de, rolandberger.com: one primary call to action, five to six navigation items, dated and labelled news, plain-language headings, institution address and legal links in the footer, research and projects presented as labelled items with short descriptions.

## Accessibility
- WCAG 2.2 AA contrast, visible focus (3px accent outline), skip-to-content link, labelled form fields, reduced-motion respected.
