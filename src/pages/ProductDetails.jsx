import { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaShoppingCart, FaChevronLeft, FaChevronRight } from 'react-icons/fa';
import { useCart } from '../context/CartContext';
import { useLanguage } from '../context/LanguageContext';
import { products } from '../assets/data/products';

const ProductDetails = () => {
  const { id } = useParams();
  const navigate = useNavigate();
  const { addToCart } = useCart();
  const { translations } = useLanguage();
  const [product, setProduct] = useState(null);
  const [quantity, setQuantity] = useState(1);
  const [currentImageIndex, setCurrentImageIndex] = useState(0);

  useEffect(() => {
    const foundProduct = products.find(p => p.id === parseInt(id));
    if (foundProduct) {
      setProduct(foundProduct);
    } else {
      navigate('/products');
    }
  }, [id, navigate]);

  const handleAddToCart = () => {
    addToCart({ ...product, quantity });
    navigate('/cart');
  };

  const nextImage = () => {
    setCurrentImageIndex(prev => 
      prev === product.images.length - 1 ? 0 : prev + 1
    );
  };

  const prevImage = () => {
    setCurrentImageIndex(prev => 
      prev === 0 ? product.images.length - 1 : prev - 1
    );
  };

  if (!product) return <div className="loading">Loading...</div>;

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="product-details"
    >
      <div className="container">
        <button className="back-button" onClick={() => navigate(-1)}>
          {translations.backToProducts}
        </button>
        
        <div className="product-details-content">
          <div className="product-gallery">
            <div className="main-image">
              <img 
                src={product.images[currentImageIndex]} 
                alt={product.name} 
              />
              <button className="nav-button prev" onClick={prevImage}>
                <FaChevronLeft />
              </button>
              <button className="nav-button next" onClick={nextImage}>
                <FaChevronRight />
              </button>
            </div>
            <div className="thumbnail-container">
              {product.images.map((img, index) => (
                <img
                  key={index}
                  src={img}
                  alt={`${product.name} thumbnail ${index + 1}`}
                  className={index === currentImageIndex ? 'active' : ''}
                  onClick={() => setCurrentImageIndex(index)}
                />
              ))}
            </div>
          </div>
          
          <div className="product-info">
            <h1>{product.name}</h1>
            <div className="product-meta">
              <span className="product-category">{product.category}</span>
              {product.prescriptionRequired && (
                <span className="prescription-badge">
                  {translations.prescriptionRequired}
                </span>
              )}
            </div>
            
            <div className="product-price">
              ${product.price.toFixed(2)}
              {product.originalPrice && (
                <span className="original-price">${product.originalPrice.toFixed(2)}</span>
              )}
            </div>
            
            <div className="product-description">
              <h3>{translations.description}</h3>
              <p>{product.description}</p>
            </div>
            
            <div className="product-details-specs">
              <h3>{translations.details}</h3>
              <ul>
                <li>
                  <strong>{translations.manufacturer}:</strong> {product.manufacturer}
                </li>
                <li>
                  <strong>{translations.dosage}:</strong> {product.dosage}
                </li>
                <li>
                  <strong>{translations.quantity}:</strong> {product.packageQuantity}
                </li>
                <li>
                  <strong>{translations.expiryDate}:</strong> {product.expiryDate}
                </li>
              </ul>
            </div>
            
            <div className="product-actions">
              <div className="quantity-selector">
                <button 
                  onClick={() => setQuantity(prev => Math.max(1, prev - 1))}
                  disabled={quantity <= 1}
                >
                  -
                </button>
                <span>{quantity}</span>
                <button onClick={() => setQuantity(prev => prev + 1)}>+</button>
              </div>
              
              <button 
                className="add-to-cart-btn"
                onClick={handleAddToCart}
              >
                <FaShoppingCart /> {translations.addToCart}
              </button>
            </div>
          </div>
        </div>
      </div>
    </motion.div>
  );
};

export default ProductDetails;