import { useLanguage } from '../context/LanguageContext'; // Use the custom hook

const LanguageSelector = () => {
  const { language, changeLanguage } = useLanguage(); // Use the custom hook

  return (
    <div className="language-selector">
      <select
        value={language}
        onChange={(e) => changeLanguage(e.target.value)}
      >
        <option value="en">English</option>
        <option value="es">Español</option>
        <option value="fr">Français</option>
        <option value="de">Deutsch</option>
        <option value="ar">العربية</option>
      </select>
    </div>
  );
};

export default LanguageSelector;