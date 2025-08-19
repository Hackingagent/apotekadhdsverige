import { useState, useContext } from 'react';
import { motion } from 'framer-motion';
import { FaUser, FaEnvelope, FaPhone, FaMapMarkerAlt, FaEdit, FaHistory, FaHeart } from 'react-icons/fa';
import { useLanguage } from '../context/LanguageContext';

const Account = () => {
  const { translations } = useLanguage();
  const [activeTab, setActiveTab] = useState('profile');
  const [isEditing, setIsEditing] = useState(false);

  const [profileData, setProfileData] = useState({
    firstName: 'John',
    lastName: 'Doe',
    email: 'john.doe@example.com',
    phone: '+1 (555) 123-4567',
    address: '123 Main St, City, State 12345'
  });

  const orders = [
    { id: 1, date: '2024-01-15', total: 45.99, status: 'Delivered' },
    { id: 2, date: '2024-01-10', total: 89.50, status: 'Processing' },
    { id: 3, date: '2024-01-05', total: 32.75, status: 'Shipped' }
  ];

  const wishlist = [
    { id: 1, name: 'Vitamin C 1000mg', price: 12.99 },
    { id: 2, name: 'Omega-3 Fish Oil', price: 18.50 }
  ];

  const handleProfileChange = (e) => {
    const { name, value } = e.target;
    setProfileData(prev => ({ ...prev, [name]: value }));
  };

  const handleSaveProfile = () => {
    setIsEditing(false);
    // Save profile logic here
  };

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="account-page"
    >
      <div className="container">
        <h1>{translations.myAccount}</h1>
        
        <div className="account-tabs">
          <button 
            className={activeTab === 'profile' ? 'active' : ''}
            onClick={() => setActiveTab('profile')}
          >
            <FaUser /> {translations.profile}
          </button>
          <button 
            className={activeTab === 'orders' ? 'active' : ''}
            onClick={() => setActiveTab('orders')}
          >
            <FaHistory /> {translations.orderHistory}
          </button>
          <button 
            className={activeTab === 'wishlist' ? 'active' : ''}
            onClick={() => setActiveTab('wishlist')}
          >
            <FaHeart /> {translations.wishlist}
          </button>
        </div>
        
        <div className="account-content">
          {activeTab === 'profile' && (
            <div className="profile-section">
              <div className="section-header">
                <h2>{translations.personalInformation}</h2>
                <button 
                  className="edit-btn"
                  onClick={() => setIsEditing(!isEditing)}
                >
                  <FaEdit /> {isEditing ? translations.cancel : translations.edit}
                </button>
              </div>
              
              <form className="profile-form">
                <div className="form-row">
                  <div className="form-group">
                    <label>{translations.firstName}</label>
                    <input
                      type="text"
                      name="firstName"
                      value={profileData.firstName}
                      onChange={handleProfileChange}
                      disabled={!isEditing}
                    />
                  </div>
                  <div className="form-group">
                    <label>{translations.lastName}</label>
                    <input
                      type="text"
                      name="lastName"
                      value={profileData.lastName}
                      onChange={handleProfileChange}
                      disabled={!isEditing}
                    />
                  </div>
                </div>
                
                <div className="form-group">
                  <label><FaEnvelope /> {translations.email}</label>
                  <input
                    type="email"
                    name="email"
                    value={profileData.email}
                    onChange={handleProfileChange}
                    disabled={!isEditing}
                  />
                </div>
                
                <div className="form-group">
                  <label><FaPhone /> {translations.phone}</label>
                  <input
                    type="tel"
                    name="phone"
                    value={profileData.phone}
                    onChange={handleProfileChange}
                    disabled={!isEditing}
                  />
                </div>
                
                <div className="form-group">
                  <label><FaMapMarkerAlt /> {translations.address}</label>
                  <textarea
                    name="address"
                    value={profileData.address}
                    onChange={handleProfileChange}
                    disabled={!isEditing}
                    rows="3"
                  ></textarea>
                </div>
                
                {isEditing && (
                  <button 
                    type="button" 
                    className="save-btn"
                    onClick={handleSaveProfile}
                  >
                    {translations.saveChanges}
                  </button>
                )}
              </form>
            </div>
          )}
          
          {activeTab === 'orders' && (
            <div className="orders-section">
              <h2>{translations.orderHistory}</h2>
              {orders.length > 0 ? (
                <div className="orders-list">
                  {orders.map(order => (
                    <div key={order.id} className="order-item">
                      <div className="order-info">
                        <h3>Order #{order.id}</h3>
                        <p>{translations.date}: {order.date}</p>
                        <p>{translations.total}: ${order.total.toFixed(2)}</p>
                      </div>
                      <div className="order-status">
                        <span className={`status ${order.status.toLowerCase()}`}>
                          {order.status}
                        </span>
                      </div>
                    </div>
                  ))}
                </div>
              ) : (
                <p className="no-orders">{translations.noOrdersYet}</p>
              )}
            </div>
          )}
          
          {activeTab === 'wishlist' && (
            <div className="wishlist-section">
              <h2>{translations.yourWishlist}</h2>
              {wishlist.length > 0 ? (
                <div className="wishlist-items">
                  {wishlist.map(item => (
                    <div key={item.id} className="wishlist-item">
                      <div className="item-info">
                        <h3>{item.name}</h3>
                        <p>${item.price.toFixed(2)}</p>
                      </div>
                      <div className="item-actions">
                        <button className="add-to-cart-btn">
                          {translations.addToCart}
                        </button>
                        <button className="remove-btn">
                          {translations.remove}
                        </button>
                      </div>
                    </div>
                  ))}
                </div>
              ) : (
                <p className="no-wishlist">{translations.wishlistEmpty}</p>
              )}
            </div>
          )}
        </div>
      </div>
    </motion.div>
  );
};

export default Account;