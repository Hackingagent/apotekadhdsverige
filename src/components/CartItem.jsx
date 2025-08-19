import { useState } from 'react';
import { motion } from 'framer-motion';
import { FaTrash, FaMinus, FaPlus } from 'react-icons/fa';
import { useLanguage } from '../context/LanguageContext';

const CartItem = ({ item, onRemove, onUpdateQuantity }) => {
    const { translations } = useLanguage();
  const [quantity, setQuantity] = useState(item.quantity);

  const handleQuantityChange = (newQuantity) => {
    if (newQuantity >= 1 && newQuantity <= 100) {
      setQuantity(newQuantity);
      onUpdateQuantity(item.id, newQuantity);
    }
  };

  const handleRemove = () => {
    onRemove(item.id);
  };

  return (
    <motion.div
      initial={{ opacity: 0, y: 20 }}
      animate={{ opacity: 1, y: 0 }}
      exit={{ opacity: 0, x: -20 }}
      transition={{ duration: 0.3 }}
      className="cart-item"
    >
      <div className="cart-item-image">
        <img src={item.images[0]} alt={item.name} />
      </div>

      <div className="cart-item-details">
        <h3>{item.name}</h3>
        <p className="category">{item.category}</p>
        {item.prescriptionRequired && (
          <p className="prescription-note">{translations.prescriptionRequired}</p>
        )}
      </div>

      <div className="cart-item-quantity">
        <button 
          onClick={() => handleQuantityChange(quantity - 1)}
          aria-label={translations.decreaseQuantity}
        >
          <FaMinus />
        </button>
        <input
          type="number"
          min="1"
          max="100"
          value={quantity}
          onChange={(e) => handleQuantityChange(parseInt(e.target.value) || 1)}
        />
        <button 
          onClick={() => handleQuantityChange(quantity + 1)}
          aria-label={translations.increaseQuantity}
        >
          <FaPlus />
        </button>
      </div>

      <div className="cart-item-price">
        ${(item.price * quantity).toFixed(2)}
      </div>

      <button 
        className="cart-item-remove"
        onClick={handleRemove}
        aria-label={translations.removeItem}
      >
        <FaTrash />
      </button>
    </motion.div>
  );
};

export default CartItem;