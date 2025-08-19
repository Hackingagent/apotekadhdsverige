import { useState, useContext } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaUser, FaEnvelope, FaLock, FaGoogle, FaFacebook } from 'react-icons/fa';
import { useLanguage } from '../context/LanguageContext';

const Register = () => {
  const { translations } = useLanguage();
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    firstName: '',
    lastName: '',
    email: '',
    password: '',
    confirmPassword: '',
    agreeToTerms: false
  });
  const [errors, setErrors] = useState({});
  const [isSubmitting, setIsSubmitting] = useState(false);

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value
    }));
  };

  const validateForm = () => {
    const newErrors = {};
    if (!formData.firstName.trim()) newErrors.firstName = translations.requiredField;
    if (!formData.lastName.trim()) newErrors.lastName = translations.requiredField;
    if (!formData.email.trim()) {
      newErrors.email = translations.requiredField;
    } else if (!/^\S+@\S+\.\S+$/.test(formData.email)) {
      newErrors.email = translations.invalidEmail;
    }
    if (!formData.password.trim()) newErrors.password = translations.requiredField;
    if (formData.password.length < 6) newErrors.password = translations.passwordTooShort;
    if (formData.password !== formData.confirmPassword) {
      newErrors.confirmPassword = translations.passwordsDontMatch;
    }
    if (!formData.agreeToTerms) newErrors.agreeToTerms = translations.mustAgreeToTerms;
    
    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (validateForm()) {
      setIsSubmitting(true);
      // Simulate API call
      setTimeout(() => {
        setIsSubmitting(false);
        navigate('/account');
      }, 1500);
    }
  };

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="register-page"
    >
      <div className="container">
        <div className="auth-card">
          <h1>{translations.register}</h1>
          <p className="subtitle">{translations.registerSubtitle}</p>
          
          <form onSubmit={handleSubmit}>
            <div className="form-row">
              <div className="form-group">
                <label htmlFor="firstName">{translations.firstName}</label>
                <input
                  type="text"
                  id="firstName"
                  name="firstName"
                  value={formData.firstName}
                  onChange={handleChange}
                  className={errors.firstName ? 'error' : ''}
                  placeholder={translations.yourFirstName}
                />
                {errors.firstName && <span className="error-message">{errors.firstName}</span>}
              </div>
              
              <div className="form-group">
                <label htmlFor="lastName">{translations.lastName}</label>
                <input
                  type="text"
                  id="lastName"
                  name="lastName"
                  value={formData.lastName}
                  onChange={handleChange}
                  className={errors.lastName ? 'error' : ''}
                  placeholder={translations.yourLastName}
                />
                {errors.lastName && <span className="error-message">{errors.lastName}</span>}
              </div>
            </div>
            
            <div className="form-group">
              <label htmlFor="email">{translations.email}</label>
              <input
                type="email"
                id="email"
                name="email"
                value={formData.email}
                onChange={handleChange}
                className={errors.email ? 'error' : ''}
                placeholder={translations.yourEmail}
              />
              {errors.email && <span className="error-message">{errors.email}</span>}
            </div>
            
            <div className="form-group">
              <label htmlFor="password">{translations.password}</label>
              <input
                type="password"
                id="password"
                name="password"
                value={formData.password}
                onChange={handleChange}
                className={errors.password ? 'error' : ''}
                placeholder={translations.yourPassword}
              />
              {errors.password && <span className="error-message">{errors.password}</span>}
            </div>
            
            <div className="form-group">
              <label htmlFor="confirmPassword">{translations.confirmPassword}</label>
              <input
                type="password"
                id="confirmPassword"
                name="confirmPassword"
                value={formData.confirmPassword}
                onChange={handleChange}
                className={errors.confirmPassword ? 'error' : ''}
                placeholder={translations.confirmYourPassword}
              />
              {errors.confirmPassword && <span className="error-message">{errors.confirmPassword}</span>}
            </div>
            
            <label className="terms-checkbox">
              <input
                type="checkbox"
                name="agreeToTerms"
                checked={formData.agreeToTerms}
                onChange={handleChange}
              />
              <span>{translations.iAgreeTo} <Link to="/terms">{translations.termsAndConditions}</Link></span>
            </label>
            {errors.agreeToTerms && <span className="error-message">{errors.agreeToTerms}</span>}
            
            <button 
              type="submit" 
              className="auth-submit-btn"
              disabled={isSubmitting}
            >
              {isSubmitting ? translations.creatingAccount : translations.register}
            </button>
          </form>
          
          <div className="social-login">
            <p>{translations.orRegisterWith}</p>
            <div className="social-buttons">
              <button className="google-btn">
                <FaGoogle /> Google
              </button>
              <button className="facebook-btn">
                <FaFacebook /> Facebook
              </button>
            </div>
          </div>
          
          <div className="auth-footer">
            <p>{translations.alreadyHaveAccount} <Link to="/login">{translations.loginNow}</Link></p>
          </div>
        </div>
      </div>
    </motion.div>
  );
};

export default Register;