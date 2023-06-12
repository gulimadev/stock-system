CREATE TABLE `PRODUTOS` (
  `id` int(6) NOT NULL,
  `nome` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` float NOT NULL,
  `estoque` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `PRODUTOS`
  ADD PRIMARY KEY (`id`);
COMMIT;

CREATE TABLE `usuarios` (
  `id` int(6) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;