<footer class="border-t border-slate-800 bg-slate-950 py-10">
    <div style="max-width:1280px;margin:0 auto;padding:0 24px;">
        <div style="display:grid;grid-template-columns:1fr;gap:32px;" class="footer-grid">
            <div>
                <p style="font-size:18px;font-weight:600;color:white;">HOPn</p>
                <p style="margin-top:8px;font-size:14px;color:#94a3b8;">Enterprise-grade transformation, product, and AI programs.</p>
                <div style="margin-top:16px;font-size:14px;color:#94a3b8;">
                    <p>Email: <a href="mailto:contact@hopn.eu" style="color:#818cf8;">contact@hopn.eu</a></p>
                    <p style="margin-top:4px;">Berlin, Germany</p>
                </div>
            </div>
            <div>
                <p style="margin-bottom:12px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:#cbd5e1;">Solutions</p>
                <div style="display:flex;flex-direction:column;gap:8px;font-size:14px;">
                    <a href="{{ route('services.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Services</a>
                    <a href="{{ route('programs.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Programs</a>
                    <a href="{{ route('products.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Products</a>
                    <a href="{{ route('case-studies.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Case Studies</a>
                    <a href="{{ route('insights.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Insights</a>
                </div>
            </div>
            <div>
                <p style="margin-bottom:12px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:#cbd5e1;">Company</p>
                <div style="display:flex;flex-direction:column;gap:8px;font-size:14px;">
                    <a href="{{ route('about', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">About</a>
                    <a href="{{ route('partners.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Partners</a>
                    <a href="{{ route('careers.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Careers</a>
                    <a href="{{ route('training.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Training</a>
                </div>
            </div>
            <div>
                <p style="margin-bottom:12px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:#cbd5e1;">Contact</p>
                <div style="display:flex;flex-direction:column;gap:8px;font-size:14px;">
                    <a href="{{ route('contact.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Contact Us</a>
                    <a href="{{ route('partner-inquiry.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Partner Inquiry</a>
                    <a href="{{ route('careers.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Apply for a Job</a>
                </div>
            </div>
            <div>
                <p style="margin-bottom:12px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:#cbd5e1;">Legal</p>
                <div style="display:flex;flex-direction:column;gap:8px;font-size:14px;">
                    <a href="{{ route('legal.impressum', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Impressum</a>
                    <a href="{{ route('legal.privacy', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Privacy Policy</a>
                    <a href="{{ route('legal.cookie', ['lang' => request()->route('lang', 'en')]) }}" style="color:#94a3b8;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Cookie Policy</a>
                </div>
            </div>
        </div>
        <div style="margin-top:32px;border-top:1px solid #1e293b;padding-top:24px;font-size:12px;color:#475569;" class="footer-bottom">
            <p>© {{ date('Y') }} HOPn. All rights reserved.</p>
            <p>Built with ❤️ for enterprise transformation.</p>
        </div>
    </div>
</footer>
 
<style>
@media (min-width: 768px) {
    .footer-grid {
        grid-template-columns: 2fr 1fr 1fr 1fr 1fr !important;
    }
    .footer-bottom {
        display: flex;
        justify-content: space-between;
    }
}
@media (max-width: 767px) {
    .footer-bottom {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
}
</style>
