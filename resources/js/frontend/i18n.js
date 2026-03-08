import { createI18n } from 'vue-i18n';

const messages = {
    en: require('./locales/en.json'),
    fr: require('./locales/fr.json'),
};

// 🔹 Detect locale
function detectLocale() {
    // 1️⃣ User preference
    const saved = localStorage.getItem('locale');
    if (saved) return saved;

    // 2️⃣ Browser language
    const browserLang =
        (navigator.languages && navigator.languages[0]) ||
        navigator.language ||
        'en';

    const shortLang = browserLang.split('-')[0];

    return ['en', 'fr'].includes(shortLang) ? shortLang : 'en';
}

const i18n = createI18n({
    legacy: false, // composition API
    locale: detectLocale(),
    fallbackLocale: {
        default: ['en'],
    },
    messages,
    warnHtmlMessage: false,
});

export default i18n;
