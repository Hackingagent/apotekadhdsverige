import { useContext, useState } from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaShoppingCart, FaHeart } from 'react-icons/fa';
import { useCart } from '../context/CartContext';
import { useLanguage } from '../context/LanguageContext';


const ProductCard = ({ product }) => {
    const { translations } = useLanguage();
    const { addToCart } = useCart();
  const [isHovered, setIsHovered] = useState(false);

  const handleAddToCart = (e) => {
    e.preventDefault();
    addToCart({ ...product, quantity: 1 });
  };

  return (
    <motion.div
      whileHover={{ y: -5 }}
      transition={{ duration: 0.3 }}
      className="product-card"
    >
      <Link to={`/products/${product.id}`}>
        <div 
          className="product-image"
          onMouseEnter={() => setIsHovered(true)}
          onMouseLeave={() => setIsHovered(false)}
        >
          <img 
            src={product.images[0]} 
            alt={product.name} 
            className={isHovered && product.images[1] ? 'hide' : ''}
          />
          {product.images[1] && (
            <img 
              src={product.images[1]} 
              alt={product.name} 
              className={isHovered ? 'show' : 'hide'}
            />
          )}
          <button className="wishlist-btn">
            <FaHeart />
          </button>
          {product.prescriptionRequired && (
            <span className="prescription-badge">
              {translations.prescriptionRequired}
            </span>
          )}
        </div>

        <div className="product-info">
          <h3 className="product-name">{product.name}</h3>
          <div className="product-meta">
            <span className="product-category">{product.category}</span>
          </div>
          <p className="product-description">{product.description}</p>
          <div className="product-price-row">
            <span className="product-price">${product.price.toFixed(2)}</span>
            {product.originalPrice && (
              <span className="original-price">${product.originalPrice.toFixed(2)}</span>
            )}
          </div>
        </div>
      </Link>

      <button 
        className="add-to-cart-btn"
        onClick={handleAddToCart}
        aria-label={translations.addToCart}
      >
        <FaShoppingCart /> {translations.addToCart}
      </button>
    </motion.div>
  );
};

export default ProductCard;