import { useState } from 'react';
import { Link, NavLink } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaShoppingCart, FaUser, FaSearch, FaBars, FaTimes } from 'react-icons/fa';
import { useLanguage } from '../context/LanguageContext';
import { useCart } from '../context/CartContext';
import LanguageSelector from './LanguageSelector';

const Header = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [searchQuery, setSearchQuery] = useState('');
  const { translations } = useLanguage();
  const { cartItems } = useCart();

  const toggleMenu = () => setIsMenuOpen(!isMenuOpen);

  return (
    <header className="header">
      <div className="header-top">
        <div className="container">
          <p>{translations.headerPromo}</p>
          <LanguageSelector />
        </div>
      </div>
      <div className="header-main">
        <div className="container">
          <Link to="/" className="logo">
            <motion.h1 
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ duration: 0.5 }}
            >
              PharmaCare
            </motion.h1>
          </Link>
          
          <div className="search-bar">
            <input 
              type="text" 
              placeholder={translations.searchPlaceholder}
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
            />
            <button><FaSearch /></button>
          </div>
          
          <div className="header-actions">
            <Link to="/account" className="account-link">
              <FaUser />
              <span>{translations.myAccount}</span>
            </Link>
            <Link to="/cart" className="cart-link">
              <FaShoppingCart />
              <span className="cart-count">{cartItems.length}</span>
              <span>{translations.cart}</span>
            </Link>
          </div>
          
          <button className="mobile-menu-btn" onClick={toggleMenu}>
            {isMenuOpen ? <FaTimes /> : <FaBars />}
          </button>
        </div>
      </div>
      
      <nav className={`main-nav ${isMenuOpen ? 'open' : ''}`}>
        <div className="container">
          <ul>
            <li><NavLink to="/" end>{translations.home}</NavLink></li>
            <li><NavLink to="/products">{translations.products}</NavLink></li>
            <li><NavLink to="/about">{translations.about}</NavLink></li>
            <li><NavLink to="/blog">{translations.blog}</NavLink></li>
            <li><NavLink to="/contact">{translations.contact}</NavLink></li>
          </ul>
        </div>
      </nav>
    </header>
  );
};

export default Header;