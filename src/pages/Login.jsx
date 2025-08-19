import { useState, useContext } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaUser, FaLock, FaGoogle, FaFacebook } from 'react-icons/fa';
import { useLanguage } from '../context/LanguageContext';

const Login = () => {
  const { translations } = useLanguage();
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    email: '',
    password: ''
  });
  const [errors, setErrors] = useState({});
  const [isSubmitting, setIsSubmitting] = useState(false);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const validateForm = () => {
    const newErrors = {};
    if (!formData.email.trim()) {
      newErrors.email = translations.requiredField;
    } else if (!/^\S+@\S+\.\S+$/.test(formData.email)) {
      newErrors.email = translations.invalidEmail;
    }
    if (!formData.password.trim()) newErrors.password = translations.requiredField;
    
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
      className="login-page"
    >
      <div className="container">
        <div className="auth-card">
          <h1>{translations.login}</h1>
          <p className="subtitle">{translations.loginSubtitle}</p>
          
          <form onSubmit={handleSubmit}>
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
            
            <div className="form-options">
              <label className="remember-me">
                <input type="checkbox" />
                <span>{translations.rememberMe}</span>
              </label>
              <Link to="/forgot-password" className="forgot-password">
                {translations.forgotPassword}
              </Link>
            </div>
            
            <button 
              type="submit" 
              className="auth-submit-btn"
              disabled={isSubmitting}
            >
              {isSubmitting ? translations.loggingIn : translations.login}
            </button>
          </form>
          
          <div className="social-login">
            <p>{translations.orLoginWith}</p>
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
            <p>{translations.dontHaveAccount} <Link to="/register">{translations.registerNow}</Link></p>
          </div>
        </div>
      </div>
    </motion.div>
  );
};

export default Login;