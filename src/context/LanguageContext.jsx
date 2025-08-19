import { createContext, useContext, useState, useEffect } from 'react';
import { translations } from '../translations';

// Create the context
export const LanguageContext = createContext();

// Custom hook
export const useLanguage = () => {
  const context = useContext(LanguageContext);
  if (!context) {
    throw new Error('useLanguage must be used within a LanguageProvider');
  }
  return context;
};

// Provider component
export const LanguageProvider = ({ children }) => {
  const [language, setLanguage] = useState('en');

  useEffect(() => {
    const savedLanguage = localStorage.getItem('pharmaLanguage');
    if (savedLanguage) {
      setLanguage(savedLanguage);
    } else {
      const userLanguage = navigator.language.split('-')[0];
      if (translations[userLanguage]) {
        setLanguage(userLanguage);
      }
    }
  }, []);

  useEffect(() => {
    localStorage.setItem('pharmaLanguage', language);
  }, [language]);

  const changeLanguage = (lang) => {
    if (translations[lang]) {
      setLanguage(lang);
    }
  };

  const value = {
    language,
    translations: translations[language] || translations.en,
    changeLanguage
  };

  return (
    <LanguageContext.Provider value={value}>
      {children}
    </LanguageContext.Provider>
  );
};