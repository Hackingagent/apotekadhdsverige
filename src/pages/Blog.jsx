import { useContext, useState } from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaCalendarAlt, FaUser, FaSearch } from 'react-icons/fa';
import { blogPosts } from '../assets/data/blogPosts';
import { useLanguage } from '../context/LanguageContext';

const Blog = () => {
  const { translations } = useLanguage();
  const [searchTerm, setSearchTerm] = useState('');
  const [activeCategory, setActiveCategory] = useState('all');

  const categories = ['all', ...new Set(blogPosts.map(post => post.category))];

  const filteredPosts = blogPosts.filter(post => {
    const matchesSearch = post.title.toLowerCase().includes(searchTerm.toLowerCase()) || 
                         post.content.toLowerCase().includes(searchTerm.toLowerCase());
    const matchesCategory = activeCategory === 'all' || post.category === activeCategory;
    return matchesSearch && matchesCategory;
  });

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="blog-page"
    >
      <div className="container">
        <div className="blog-header">
          <h1>{translations.blog}</h1>
          <p>{translations.blogSubtitle}</p>
        </div>
        
        <div className="blog-controls">
          <div className="search-box">
            <input
              type="text"
              placeholder={translations.searchBlogPosts}
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
            />
            <FaSearch />
          </div>
          
          <div className="category-filter">
            {categories.map(category => (
              <button
                key={category}
                className={activeCategory === category ? 'active' : ''}
                onClick={() => setActiveCategory(category)}
              >
                {translations[category] || category}
              </button>
            ))}
          </div>
        </div>
        
        <div className="blog-grid">
          {filteredPosts.length > 0 ? (
            filteredPosts.map(post => (
              <motion.div 
                key={post.id}
                className="blog-card"
                whileHover={{ y: -5 }}
                transition={{ duration: 0.3 }}
              >
                <Link to={`/blog/${post.id}`}>
                  <div className="blog-image">
                    <img src={post.image} alt={post.title} />
                  </div>
                  <div className="blog-content">
                    <div className="blog-meta">
                      <span><FaCalendarAlt /> {post.date}</span>
                      <span><FaUser /> {post.author}</span>
                    </div>
                    <h3>{post.title}</h3>
                    <p className="excerpt">{post.excerpt}</p>
                    <div className="blog-category">{post.category}</div>
                  </div>
                </Link>
              </motion.div>
            ))
          ) : (
            <div className="no-results">
              <p>{translations.noBlogPostsFound}</p>
              <button onClick={() => {
                setSearchTerm('');
                setActiveCategory('all');
              }}>
                {translations.resetFilters}
              </button>
            </div>
          )}
        </div>
      </div>
    </motion.div>
  );
};

export default Blog;