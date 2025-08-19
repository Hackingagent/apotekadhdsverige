import { useContext } from 'react';
import { motion } from 'framer-motion';
import { FaUsers, FaAward, FaClinicMedical, FaShieldAlt, FaHeart, FaClock } from 'react-icons/fa';
import { useLanguage } from '../context/LanguageContext';

const About = () => {
  const { translations } = useLanguage();

  // Animation variants
  const fadeIn = {
    initial: { opacity: 0, y: 20 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.6 }
  };

  const staggerChildren = {
    animate: {
      transition: {
        staggerChildren: 0.1
      }
    }
  };

  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="about-page"
    >
      {/* Hero Section */}
      <section className="about-hero">
        <div className="container">
          <motion.h1
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8 }}
          >
            {translations.aboutUs || 'About PharmaCare'}
          </motion.h1>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.2 }}
            className="subtitle"
          >
            {translations.aboutSubtitle || 'Your trusted partner in health and wellness for over 15 years'}
          </motion.p>
        </div>
      </section>

      {/* Mission Statement */}
      <section className="mission-section">
        <div className="container">
          <motion.div
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ duration: 0.7 }}
            className="mission-card"
          >
            <h2>{translations.ourMission || 'Our Mission'}</h2>
            <p>
              {translations.missionStatement || 
                'To provide accessible, affordable, and high-quality healthcare solutions to communities worldwide, ' +
                'empowering individuals to take control of their health and well-being through trusted medications ' +
                'and expert guidance.'
              }
            </p>
          </motion.div>
        </div>
      </section>

      {/* Our Story */}
      <section className="our-story">
        <div className="container">
          <div className="story-content">
            <motion.h2
              initial={{ opacity: 0, x: -20 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.7 }}
            >
              {translations.ourStory || 'Our Story'}
            </motion.h2>
            <motion.p
              initial={{ opacity: 0, x: -20 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.7, delay: 0.1 }}
            >
              {translations.aboutParagraph1 || 
                'Founded in 2008 by a team of passionate pharmacists and healthcare professionals, ' +
                'PharmaCare began as a small local pharmacy with a big vision. We recognized the need ' +
                'for a more accessible and patient-centric approach to healthcare.'
              }
            </motion.p>
            <motion.p
              initial={{ opacity: 0, x: -20 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.7, delay: 0.2 }}
            >
              {translations.aboutParagraph2 || 
                'Over the years, we have grown into a trusted online healthcare destination, serving ' +
                'thousands of customers across the country. Our commitment to quality, safety, and ' +
                'customer care has remained unchanged since day one.'
              }
            </motion.p>
            <motion.p
              initial={{ opacity: 0, x: -20 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.7, delay: 0.3 }}
            >
              {translations.aboutParagraph3 || 
                'Today, we combine traditional pharmaceutical expertise with modern technology to ' +
                'provide a seamless healthcare experience, ensuring that our customers receive the ' +
                'right medications and advice when they need it most.'
              }
            </motion.p>
          </div>
          <motion.div
            initial={{ opacity: 0, x: 20 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.7, delay: 0.4 }}
            className="story-image"
          >
            <img 
              src="/assets/images/pharmacy-team.jpg" 
              alt="Our Pharmacy Team" 
              onError={(e) => {
                e.target.style.display = 'none';
              }}
            />
            <div className="image-placeholder">
              <FaUsers size={48} />
              <p>Our Dedicated Team</p>
            </div>
          </motion.div>
        </div>
      </section>

      {/* Our Values */}
      <section className="our-values">
        <div className="container">
          <motion.h2
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.7 }}
          >
            {translations.ourValues || 'Our Core Values'}
          </motion.h2>
          <motion.div
            variants={staggerChildren}
            initial="initial"
            animate="animate"
            className="values-grid"
          >
            <motion.div
              variants={fadeIn}
              className="value-card"
            >
              <FaShieldAlt className="value-icon" />
              <h3>{translations.qualityExcellence || 'Quality & Excellence'}</h3>
              <p>
                {translations.qualityExcellenceDesc || 
                  'We source medications only from certified manufacturers and maintain strict quality control standards.'
                }
              </p>
            </motion.div>

            <motion.div
              variants={fadeIn}
              className="value-card"
            >
              <FaHeart className="value-icon" />
              <h3>{translations.customerFirst || 'Customer First'}</h3>
              <p>
                {translations.customerFirstDesc || 
                  'Your health and satisfaction are our top priorities. We listen, understand, and deliver personalized care.'
                }
              </p>
            </motion.div>

            <motion.div
              variants={fadeIn}
              className="value-card"
            >
              <FaClinicMedical className="value-icon" />
              <h3>{translations.healthCommitment || 'Health Commitment'}</h3>
              <p>
                {translations.healthCommitmentDesc || 
                  'We are committed to improving community health through education, accessibility, and affordable care.'
                }
              </p>
            </motion.div>

            <motion.div
              variants={fadeIn}
              className="value-card"
            >
              <FaAward className="value-icon" />
              <h3>{translations.expertise || 'Expert Guidance'}</h3>
              <p>
                {translations.expertiseDesc || 
                  'Our team of licensed pharmacists provides professional advice and support for all your healthcare needs.'
                }
              </p>
            </motion.div>
          </motion.div>
        </div>
      </section>

      {/* Statistics */}
      <section className="stats-section">
        <div className="container">
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 1 }}
            className="stats-grid"
          >
            <div className="stat-item">
              <motion.div
                initial={{ scale: 0 }}
                animate={{ scale: 1 }}
                transition={{ duration: 0.5, delay: 0.1 }}
                className="stat-number"
              >
                15+
              </motion.div>
              <p>{translations.yearsExperience || 'Years of Experience'}</p>
            </div>
            <div className="stat-item">
              <motion.div
                initial={{ scale: 0 }}
                animate={{ scale: 1 }}
                transition={{ duration: 0.5, delay: 0.2 }}
                className="stat-number"
              >
                50,000+
              </motion.div>
              <p>{translations.happyCustomers || 'Happy Customers'}</p>
            </div>
            <div className="stat-item">
              <motion.div
                initial={{ scale: 0 }}
                animate={{ scale: 1 }}
                transition={{ duration: 0.5, delay: 0.3 }}
                className="stat-number"
              >
                500+
              </motion.div>
              <p>{translations.products || 'Quality Products'}</p>
            </div>
            <div className="stat-item">
              <motion.div
                initial={{ scale: 0 }}
                animate={{ scale: 1 }}
                transition={{ duration: 0.5, delay: 0.4 }}
                className="stat-number"
              >
                24/7
              </motion.div>
              <p>{translations.support || 'Customer Support'}</p>
            </div>
          </motion.div>
        </div>
      </section>

      {/* Team Section */}
      <section className="our-team">
        <div className="container">
          <motion.h2
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.7 }}
          >
            {translations.ourTeam || 'Meet Our Expert Team'}
          </motion.h2>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="team-description"
          >
            {translations.teamDescription || 
              'Our team of licensed pharmacists and healthcare professionals is dedicated to providing ' +
              'you with the best possible care and advice.'
            }
          </motion.p>
          
          <motion.div
            variants={staggerChildren}
            initial="initial"
            animate="animate"
            className="team-grid"
          >
            <motion.div
              variants={fadeIn}
              className="team-member"
            >
              <div className="member-image">
                <FaUsers className="member-icon" />
              </div>
              <h3>Dr. Sarah Johnson</h3>
              <p>{translations.headPharmacist || 'Head Pharmacist'}</p>
              <span>15+ years experience</span>
            </motion.div>

            <motion.div
              variants={fadeIn}
              className="team-member"
            >
              <div className="member-image">
                <FaUsers className="member-icon" />
              </div>
              <h3>Dr. Michael Chen</h3>
              <p>{translations.clinicalPharmacist || 'Clinical Pharmacist'}</p>
              <span>12+ years experience</span>
            </motion.div>

            <motion.div
              variants={fadeIn}
              className="team-member"
            >
              <div className="member-image">
                <FaUsers className="member-icon" />
              </div>
              <h3>Dr. Emily Rodriguez</h3>
              <p>{translations.pharmacyTechnician || 'Pharmacy Technician'}</p>
              <span>8+ years experience</span>
            </motion.div>
          </motion.div>
        </div>
      </section>

      {/* Certifications */}
      <section className="certifications">
        <div className="container">
          <motion.h2
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.7 }}
          >
            {translations.certifications || 'Our Certifications'}
          </motion.h2>
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 1, delay: 0.3 }}
            className="certs-grid"
          >
            <div className="cert-item">
              <FaAward className="cert-icon" />
              <h3>FDA Approved</h3>
              <p>All medications meet FDA standards</p>
            </div>
            <div className="cert-item">
              <FaShieldAlt className="cert-icon" />
              <h3>ISO 9001 Certified</h3>
              <p>Quality management certified</p>
            </div>
            <div className="cert-item">
              <FaClock className="cert-icon" />
              <h3>24/7 Pharmacy License</h3>
              <p>Fully licensed and regulated</p>
            </div>
          </motion.div>
        </div>
      </section>
    </motion.div>
  );
};

export default About;