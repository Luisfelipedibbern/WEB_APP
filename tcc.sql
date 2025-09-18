-- Banco e tabelas
CREATE DATABASE IF NOT EXISTS techlmr DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE techlmr;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS pagamentos (
  id_pagamento INT AUTO_INCREMENT PRIMARY KEY,
  id_pedido INT NOT NULL,
  metodo_pagamento ENUM('Cartão','Pix','Boleto') NOT NULL,
  status_pagamento ENUM('Pendente','Aprovado','Recusado') DEFAULT 'Pendente',
  valor DECIMAL(10,2) NOT NULL,
  data_pagamento TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tokens de redefinição de senha
CREATE TABLE IF NOT EXISTS password_resets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  token VARCHAR(128) NOT NULL UNIQUE,
  expires_at DATETIME NOT NULL,
  used TINYINT(1) NOT NULL DEFAULT 0,
  used_at DATETIME NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_pr_user FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
);