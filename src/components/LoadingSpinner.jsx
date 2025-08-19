import { motion } from 'framer-motion';

const LoadingSpinner = ({ size = 40, color = '#0d6efd' }) => {
  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="loading-spinner-container"
    >
      <motion.div
        className="loading-spinner"
        animate={{ rotate: 360 }}
        transition={{ duration: 1, repeat: Infinity, ease: "linear" }}
        style={{
          width: size,
          height: size,
          borderWidth: size / 10,
          borderColor: color,
          borderTopColor: 'transparent',
        }}
      />
      <p>Loading...</p>
    </motion.div>
  );
};

export default LoadingSpinner;