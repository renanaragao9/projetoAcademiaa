CREATE TABLE media (
    id_media BIGINT PRIMARY KEY AUTO_INCREMENT,
    tipo_media INT,
    img_media VARCHAR(255),
    title_media VARCHAR(255),
    description_media TEXT,
    tags_media VARCHAR(255),
    user_id BIGINT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);academia