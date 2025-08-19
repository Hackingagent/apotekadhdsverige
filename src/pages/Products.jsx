import { useState, useEffect } from 'react';
import { motion } from 'framer-motion';
import { FaFilter, FaSearch } from 'react-icons/fa';
import ProductCard from '../components/ProductCard';
import { useLanguage } from '../context/LanguageContext';
import { products } from '../assets/data/products';

const Products = () => {
  const { translations } = useLanguage();
  const [filteredProducts, setFilteredProducts] = useState(products);
  const [searchTerm, setSearchTerm] = useState('');
  const [filters, setFilters] = useState({
    category: 'all',
    priceRange: 'all',
    prescription: 'all'
  });
  const [showFilters, setShowFilters] = useState(false);

  useEffect(() => {
    let results = products;
    
    // Apply search filter
    if (searchTerm) {
      results = results.filter(product => 
        product.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
        product.description.toLowerCase().includes(searchTerm.toLowerCase())
      );
    }
    
    // Apply category filter
    if (filters.category !== 'all') {
      results = results.filter(product => product.category === filters.category);
    }
    
    // Apply price filter
    if (filters.priceRange !== 'all') {
      const [min, max] = filters.priceRange.split('-').map(Number);
      if (max) {
        results = results.filter(product => product.price >= min && product.price <= max);
      } else {
        results = results.filter(product => product.price >= min);
      }
    }
    
    // Apply prescription filter
    if (filters.prescription !== 'all') {
      results = results.filter(product => 
        filters.prescription === 'yes' ? product.prescriptionRequired : !product.prescriptionRequired
      );
    }
    
    setFilteredProducts(results);
  }, [searchTerm, filters]);

  const handleFilterChange = (e) => {
    const { name, value } = e.target;
    setFilters(prev => ({ ...prev, [name]: value }));
  };

  const categories = [...new Set(products.map(product => product.category))];

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="products-page"
    >
      <div className="container">
        <h1>{translations.products}</h1>
        
        <div className="products-controls">
          <div className="search-box">
            <input
              type="text"
              placeholder={translations.searchProducts}
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
            />
            <FaSearch />
          </div>
          
          <button 
            className="filter-toggle"
            onClick={() => setShowFilters(!showFilters)}
          >
            <FaFilter /> {translations.filters}
          </button>
        </div>
        
        <div className={`filters-panel ${showFilters ? 'show' : ''}`}>
          <div className="filter-group">
            <label>{translations.category}</label>
            <select 
              name="category" 
              value={filters.category}
              onChange={handleFilterChange}
            >
              <option value="all">{translations.allCategories}</option>
              {categories.map(category => (
                <option key={category} value={category}>{category}</option>
              ))}
            </select>
          </div>
          
          <div className="filter-group">
            <label>{translations.priceRange}</label>
            <select 
              name="priceRange" 
              value={filters.priceRange}
              onChange={handleFilterChange}
            >
              <option value="all">{translations.allPrices}</option>
              <option value="0-10">$0 - $10</option>
              <option value="10-25">$10 - $25</option>
              <option value="25-50">$25 - $50</option>
              <option value="50-100">$50 - $100</option>
              <option value="100-">$100+</option>
            </select>
          </div>
          
          <div className="filter-group">
            <label>{translations.prescription}</label>
            <select 
              name="prescription" 
              value={filters.prescription}
              onChange={handleFilterChange}
            >
              <option value="all">{translations.all}</option>
              <option value="yes">{translations.prescriptionRequired}</option>
              <option value="no">{translations.overTheCounter}</option>
            </select>
          </div>
        </div>
        
        <div className="products-grid">
          {filteredProducts.length > 0 ? (
            filteredProducts.map(product => (
              <ProductCard key={product.id} product={product} />
            ))
          ) : (
            <p className="no-results">{translations.noProductsFound}</p>
          )}
        </div>
      </div>
    </motion.div>
  );
};

export default Products;