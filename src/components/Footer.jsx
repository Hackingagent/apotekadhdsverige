import { useContext } from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { 
  FaFacebook, FaTwitter, FaInstagram, FaLinkedin, 
  FaMapMarkerAlt, FaPhone, FaEnvelope, FaClock 
} from 'react-icons/fa';
import { useLanguage } from '../context/LanguageContext';

const Footer = () => {
    const { translations } = useLanguage();

  return (
    <motion.footer
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      transition={{ duration: 0.5 }}
      className="footer"
    >
      <div className="container">
        <div className="footer-grid">
          <div className="footer-column">
            <h3>{translations.aboutUs}</h3>
            <p>{translations.aboutUsDescription}</p>
            <div className="social-links">
              <a href="#"><FaFacebook /></a>
              <a href="#"><FaTwitter /></a>
              <a href="#"><FaInstagram /></a>
              <a href="#"><FaLinkedin /></a>
            </div>
          </div>

          <div className="footer-column">
            <h3>{translations.quickLinks}</h3>
            <ul>
              <li><Link to="/">{translations.home}</Link></li>
              <li><Link to="/products">{translations.products}</Link></li>
              <li><Link to="/about">{translations.about}</Link></li>
              <li><Link to="/blog">{translations.blog}</Link></li>
              <li><Link to="/contact">{translations.contact}</Link></li>
            </ul>
          </div>

          <div className="footer-column">
            <h3>{translations.customerService}</h3>
            <ul>
              <li><Link to="/faq">{translations.faq}</Link></li>
              <li><Link to="/shipping">{translations.shippingPolicy}</Link></li>
              <li><Link to="/returns">{translations.returnPolicy}</Link></li>
              <li><Link to="/privacy">{translations.privacyPolicy}</Link></li>
              <li><Link to="/terms">{translations.termsConditions}</Link></li>
            </ul>
          </div>

          <div className="footer-column">
            <h3>{translations.contactUs}</h3>
            <ul className="contact-info">
              <li>
                <FaMapMarkerAlt />
                <span>123 Pharma Street, Health City, HC 12345</span>
              </li>
              <li>
                <FaPhone />
                <span>+1 (123) 456-7890</span>
              </li>
              <li>
                <FaEnvelope />
                <span>info@pharmacare.com</span>
              </li>
              <li>
                <FaClock />
                <span>{translations.workingHours}: 9:00 AM - 6:00 PM</span>
              </li>
            </ul>
          </div>
        </div>

        <div className="footer-bottom">
          <p>&copy; {new Date().getFullYear()} PharmaCare. {translations.allRightsReserved}.</p>
        </div>
      </div>
    </motion.footer>
  );
};

export default Footer;