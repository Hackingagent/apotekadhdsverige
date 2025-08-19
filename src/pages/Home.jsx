import { useContext } from 'react';
import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import { FaArrowRight, FaPills, FaHeartbeat, FaShippingFast } from 'react-icons/fa';
import ProductCard from '../components/ProductCard';
import { products } from '../assets/data/products';
import { useLanguage } from '../context/LanguageContext';

const Home = () => {
 const { translations } = useLanguage();
  const featuredProducts = products.slice(0, 4);
  const bestSellers = products.slice(2, 6);

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="home-page"
    >
      {/* Hero Section */}
      <section className="hero">
        <div className="container">
          <div className="hero-content">
            <motion.h1
              initial={{ y: -20, opacity: 0 }}
              animate={{ y: 0, opacity: 1 }}
              transition={{ delay: 0.2 }}
            >
              {translations.heroTitle}
            </motion.h1>
            <motion.p
              initial={{ y: 20, opacity: 0 }}
              animate={{ y: 0, opacity: 1 }}
              transition={{ delay: 0.4 }}
            >
              {translations.heroSubtitle}
            </motion.p>
            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ delay: 0.6 }}
            >
              <Link to="/products" className="btn-primary">
                {translations.shopNow} <FaArrowRight />
              </Link>
            </motion.div>
          </div>
        </div>
      </section>

      {/* Features Section */}
      <section className="features">
        <div className="container">
          <div className="features-grid">
            <div className="feature-card">
              <FaPills className="feature-icon" />
              <h3>{translations.qualityMeds}</h3>
              <p>{translations.qualityMedsDesc}</p>
            </div>
            <div className="feature-card">
              <FaHeartbeat className="feature-icon" />
              <h3>{translations.expertAdvice}</h3>
              <p>{translations.expertAdviceDesc}</p>
            </div>
            <div className="feature-card">
              <FaShippingFast className="feature-icon" />
              <h3>{translations.fastShipping}</h3>
              <p>{translations.fastShippingDesc}</p>
            </div>
          </div>
        </div>
      </section>

      {/* Featured Products */}
      <section className="featured-products">
        <div className="container">
          <div className="section-header">
            <h2>{translations.featuredProducts}</h2>
            <Link to="/products" className="view-all">
              {translations.viewAll} <FaArrowRight />
            </Link>
          </div>
          <div className="products-grid">
            {featuredProducts.map(product => (
              <ProductCard key={product.id} product={product} />
            ))}
          </div>
        </div>
      </section>

      {/* Best Sellers */}
      <section className="best-sellers">
        <div className="container">
          <div className="section-header">
            <h2>{translations.bestSellers}</h2>
            <Link to="/products" className="view-all">
              {translations.viewAll} <FaArrowRight />
            </Link>
          </div>
          <div className="products-grid">
            {bestSellers.map(product => (
              <ProductCard key={product.id} product={product} />
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="cta-section">
        <div className="container">
          <div className="cta-content">
            <h2>{translations.needHelp}</h2>
            <p>{translations.ourPharmacistsAreHere}</p>
            <div className="cta-buttons">
              <Link to="/contact" className="btn-outline">
                {translations.contactUs}
              </Link>
              <Link to="/blog" className="btn-primary">
                {translations.healthTips}
              </Link>
            </div>
          </div>
        </div>
      </section>
    </motion.div>
  );
};

export default Home;