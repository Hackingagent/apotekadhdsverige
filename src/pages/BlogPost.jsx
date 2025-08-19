import { useParams } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaCalendarAlt, FaUser, FaArrowLeft, FaShareAlt } from 'react-icons/fa';
import { blogPosts } from '../assets/data/blogPosts';
import { useLanguage } from '../context/LanguageContext';
import { useContext } from 'react';

const BlogPost = () => {
  const { id } = useParams();
  const { translations } = useLanguage();
  const post = blogPosts.find(post => post.id === parseInt(id));

  if (!post) {
    return (
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        exit={{ opacity: 0 }}
        className="blog-post-not-found"
      >
        <div className="container">
          <h2>{translations.blogPostNotFound}</h2>
          <Link to="/blog" className="btn-primary">
            {translations.backToBlog}
          </Link>
        </div>
      </motion.div>
    );
  }

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="blog-post-page"
    >
      <div className="container">
        <Link to="/blog" className="back-button">
          <FaArrowLeft /> {translations.backToBlog}
        </Link>
        
        <article className="blog-post">
          <div className="post-header">
            <div className="post-meta">
              <span><FaCalendarAlt /> {post.date}</span>
              <span><FaUser /> {post.author}</span>
              <span className="post-category">{post.category}</span>
            </div>
            <h1>{post.title}</h1>
            <div className="post-image">
              <img src={post.image} alt={post.title} />
            </div>
          </div>
          
          <div className="post-content">
            {post.content.split('\n\n').map((paragraph, index) => (
              <p key={index}>{paragraph}</p>
            ))}
          </div>
          
          <div className="post-footer">
            <div className="share-buttons">
              <button>
                <FaShareAlt /> {translations.shareThisPost}
              </button>
              {/* Add social sharing buttons here */}
            </div>
            
            <div className="post-tags">
              {post.tags.map(tag => (
                <span key={tag} className="tag">{tag}</span>
              ))}
            </div>
          </div>
        </article>
        
        {/* Related Posts */}
        <div className="related-posts">
          <h2>{translations.relatedPosts}</h2>
          <div className="related-grid">
            {blogPosts
              .filter(p => p.id !== post.id && p.category === post.category)
              .slice(0, 3)
              .map(relatedPost => (
                <div key={relatedPost.id} className="related-card">
                  <Link to={`/blog/${relatedPost.id}`}>
                    <img src={relatedPost.image} alt={relatedPost.title} />
                    <h3>{relatedPost.title}</h3>
                  </Link>
                </div>
              ))}
          </div>
        </div>
      </div>
    </motion.div>
  );
};

export default BlogPost;