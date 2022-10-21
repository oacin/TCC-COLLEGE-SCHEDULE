-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Out-2022 às 17:05
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'adm', 'adm', 'adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alocar`
--

CREATE TABLE `alocar` (
  `id` int(11) NOT NULL,
  `aulaAula` int(11) NOT NULL,
  `semanaS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alocar`
--

INSERT INTO `alocar` (`id`, `aulaAula`, `semanaS`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 5),
(4, 4, 3);

--
-- Acionadores `alocar`
--
DELIMITER $$
CREATE TRIGGER `tr_status` AFTER INSERT ON `alocar` FOR EACH ROW update aula
INNER JOIN alocar ON aula.idAula = alocar.aulaAula
set aula.alocado = 0
where alocar.semanaS = 0
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `ra` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE `aula` (
  `idAula` int(11) NOT NULL,
  `cursoID` int(11) NOT NULL,
  `turmaID` int(11) NOT NULL,
  `disciplinaID` int(11) NOT NULL,
  `professorID` varchar(11) NOT NULL,
  `salaID` int(11) NOT NULL,
  `carga` int(11) NOT NULL,
  `horario` time NOT NULL,
  `alocado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aula`
--

INSERT INTO `aula` (`idAula`, `cursoID`, `turmaID`, `disciplinaID`, `professorID`, `salaID`, `carga`, `horario`, `alocado`) VALUES
(1, 1, 1, 1, '29677512005', 3, 40, '19:00:00', 1),
(2, 2, 3, 3, '80469470836', 2, 50, '19:04:00', 1),
(3, 6, 4, 4, '44444444444', 4, 250, '00:00:01', 1),
(4, 6, 4, 4, '44444444444', 4, 250, '00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `quantidadeAluno` int(11) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `qtdSemestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `quantidadeAluno`, `periodo`, `qtdSemestre`) VALUES
(1, 'Ciencia da Computação', 30, 'Noite', 8),
(2, 'Engenharia de controle e automação', 30, 'Noite', 10),
(5, 'aaaa', 122, 'aaa', 8),
(6, 'Engenharia Quimica', 15, 'Integral', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nomeD` varchar(50) NOT NULL,
  `semestre` varchar(10) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nomeD`, `semestre`, `idcurso`) VALUES
(1, 'Banco de dados I', '3', 1),
(2, 'Algebra Linear', '1', 1),
(3, 'IHM', '8', 1),
(4, 'Quimica', '4', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dsemana`
--

CREATE TABLE `dsemana` (
  `idSemana` int(11) NOT NULL,
  `diaSemana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dsemana`
--

INSERT INTO `dsemana` (`idSemana`, `diaSemana`) VALUES
(1, 'SEGUNDA-FEIRA'),
(2, 'TERÇA-FEIRA'),
(3, 'QUARTA-FEIRA'),
(4, 'QUINTA-FEIRA'),
(5, 'SEXTA-FEIRA'),
(6, 'SÁBADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `professor` varchar(11) NOT NULL,
  `disciplina` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `alocado` int(11) NOT NULL,
  `dia_semana` date NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `cpf` varchar(11) NOT NULL,
  `nomeP` varchar(100) NOT NULL,
  `salario` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `formacao` varchar(300) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `periodo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`cpf`, `nomeP`, `salario`, `data_nascimento`, `formacao`, `idDisciplina`, `periodo`) VALUES
('29677512005', 'Testeee', 3900, '1990-02-14', 'Teste', 2, 'Noite'),
('44444444444', 'Miquelino', 4500, '2022-10-10', 'teste', 4, 'Integral'),
('80469470836', 'Valeria Almeida', 3000, '1998-05-15', 'Analista de dados ', 3, 'Noite'),
('93573727760', 'Hyan Daniel', 3000, '1995-08-01', 'Banco de dados ', 1, 'Noite');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nomeS` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id`, `nomeS`, `numero`, `status`) VALUES
(1, 'Sala TI', 1, 1),
(2, 'Sala', 5, 1),
(3, 'Sala de TI', 2, 1),
(4, 'Lab 1', 25, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `semestre` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `name`, `semestre`, `id_curso`) VALUES
(1, 'CC1', 1, 1),
(2, 'CC3', 3, 1),
(3, 'ECA1', 1, 2),
(4, 'QUI4', 4, 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `alocar`
--
ALTER TABLE `alocar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aula` (`aulaAula`),
  ADD KEY `fk_semana` (`semanaS`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`ra`),
  ADD KEY `fk_curso_aluno` (`curso`);

--
-- Índices para tabela `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`idAula`),
  ADD KEY `fk_cursinho` (`cursoID`),
  ADD KEY `fk_disciplininha` (`disciplinaID`),
  ADD KEY `fk_pro` (`professorID`),
  ADD KEY `fk_salinha` (`salaID`),
  ADD KEY `fk_turminha` (`turmaID`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curso_disciplina` (`idcurso`);

--
-- Índices para tabela `dsemana`
--
ALTER TABLE `dsemana`
  ADD PRIMARY KEY (`idSemana`);

--
-- Índices para tabela `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grade_prof` (`professor`),
  ADD KEY `fk_grade_disciplina` (`disciplina`),
  ADD KEY `fk_grade_curso` (`curso`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fk_disciplina_prof` (`idDisciplina`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_curso_turma` (`id_curso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `alocar`
--
ALTER TABLE `alocar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `aula`
--
ALTER TABLE `aula`
  MODIFY `idAula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alocar`
--
ALTER TABLE `alocar`
  ADD CONSTRAINT `fk_aula` FOREIGN KEY (`aulaAula`) REFERENCES `aula` (`idAula`),
  ADD CONSTRAINT `fk_semana` FOREIGN KEY (`semanaS`) REFERENCES `dsemana` (`idSemana`);

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_curso_aluno` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`);

--
-- Limitadores para a tabela `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `fk_cursinho` FOREIGN KEY (`cursoID`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `fk_disciplininha` FOREIGN KEY (`disciplinaID`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `fk_pro` FOREIGN KEY (`professorID`) REFERENCES `professor` (`cpf`),
  ADD CONSTRAINT `fk_salinha` FOREIGN KEY (`salaID`) REFERENCES `sala` (`id`),
  ADD CONSTRAINT `fk_turminha` FOREIGN KEY (`turmaID`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_curso_disciplina` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`id`);

--
-- Limitadores para a tabela `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `fk_grade_curso` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `fk_grade_disciplina` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `fk_grade_prof` FOREIGN KEY (`professor`) REFERENCES `professor` (`cpf`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_disciplina_prof` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_curso_turma` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
