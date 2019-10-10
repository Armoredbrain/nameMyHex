CREATE DATABASE nameMyHex;
USE nameMyHex;
CREATE TABLE colors (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    hexCode VARCHAR(10) NOT NULL,
    hexName VARCHAR(50) NOT NULL,
    hexModifier VARCHAR(15),
    hexFlavor VARCHAR(15),
    hexAspect VARCHAR(15),
    hexNoise VARCHAR(15)
);