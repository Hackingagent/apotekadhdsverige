import { useContext } from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaTrash, FaArrowLeft } from 'react-icons/fa';
import CartItem from '../components/CartItem';
import { useCart } from '../context/CartContext';
import { useLanguage } from '../context/LanguageContext';

const Cart = () => {
  const { 
    cartItems, 
    removeFromCart, 
    updateQuantity, 
    clearCart, 
    subtotal 
  } = useCart();
  const { translations } = useLanguage();

  if (cartItems.length === 0) {
    return (
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        exit={{ opacity: 0 }}
        className="empty-cart"
      >
        <div className="container">
          <div className="empty-cart-content">
            <h2>{translations.yourCartIsEmpty}</h2>
            <p>{translations.addSomeProducts}</p>
            <Link to="/products" className="btn-primary">
              <FaArrowLeft /> {translations.continueShopping}
            </Link>
          </div>
        </div>
      </motion.div>
    );
  }

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="cart-page"
    >
      <div className="container">
        <h1>{translations.yourCart}</h1>
        
        <div className="cart-grid">
          <div className="cart-items">
            {cartItems.map(item => (
              <CartItem 
                key={item.id}
                item={item}
                onRemove={removeFromCart}
                onUpdateQuantity={updateQuantity}
              />
            ))}
            
            <button 
              className="clear-cart-btn"
              onClick={clearCart}
            >
              <FaTrash /> {translations.clearCart}
            </button>
          </div>
          
          <div className="cart-summary">
            <h3>{translations.orderSummary}</h3>
            <div className="summary-row">
              <span>{translations.subtotal}</span>
              <span>${subtotal.toFixed(2)}</span>
            </div>
            <div className="summary-row">
              <span>{translations.shipping}</span>
              <span>{translations.calculatedAtCheckout}</span>
            </div>
            <div className="summary-row total">
              <span>{translations.estimatedTotal}</span>
              <span>${subtotal.toFixed(2)}</span>
            </div>
            
            <Link to="/checkout" className="checkout-btn">
              {translations.proceedToCheckout}
            </Link>
            
            <Link to="/products" className="continue-shopping">
              <FaArrowLeft /> {translations.continueShopping}
            </Link>
          </div>
        </div>
      </div>
    </motion.div>
  );
};

export default Cart;