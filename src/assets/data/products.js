export const products = [
    {
      id: 1,
      name: "Ibuprofen 200mg Tablets",
      description: "Pain reliever and fever reducer, 100 tablets per bottle",
      category: "Pain Relief",
      price: 8.99,
      originalPrice: 12.99,
      prescriptionRequired: false,
      manufacturer: "Advil",
      dosage: "1-2 tablets every 4-6 hours",
      packageQuantity: "100 tablets",
      expiryDate: "12/2025",
      images: [
        "/assets/images/ibuprofen.jpg",
        "/assets/images/ibuprofen-2.jpg",
        "/assets/images/ibuprofen-3.jpg"
      ]
    },
    {
      id: 2,
      name: "Lisinopril 10mg Tablets",
      description: "For treatment of high blood pressure, 30 tablets",
      category: "Heart Health",
      price: 15.50,
      prescriptionRequired: true,
      manufacturer: "Zestril",
      dosage: "1 tablet daily",
      packageQuantity: "30 tablets",
      expiryDate: "08/2024",
      images: [
        "/assets/images/lisinopril.jpg",
        "/assets/images/lisinopril-2.jpg"
      ]
    },
    {
      id: 3,
      name: "Omeprazole 20mg Capsules",
      description: "For heartburn and acid reflux, 14 capsules",
      category: "Digestive Health",
      price: 12.75,
      prescriptionRequired: false,
      manufacturer: "Prilosec",
      dosage: "1 capsule daily before eating",
      packageQuantity: "14 capsules",
      expiryDate: "05/2025",
      images: [
        "/assets/images/omeprazole.jpg"
      ]
    },
    // Add more products as needed
  ];