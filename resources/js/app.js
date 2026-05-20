import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;

// Book a Call Modal functions - defined before Alpine starts
window.openBookCall = function() {
    var modal = document.getElementById('book-call-modal');
    if (modal) {
        modal.style.display = 'flex';
        modal.style.alignItems = 'center';
        modal.style.justifyContent = 'center';
        document.body.style.overflow = 'hidden';
    }
};

window.closeBookCall = function() {
    var modal = document.getElementById('book-call-modal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
};

Alpine.start();
