-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2024 at 04:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `program_id`, `question`, `answer`) VALUES
(104, 240, 'Why study BSc Accounting and Finance?\r\n', 'There are many benefits of studying for an Accounting and Finance degree, including a wide scope of options to work across multiple sectors, from economics to business law and management. You’ll learn through a highly practical approach and will be able to get first-hand accounting and finance work experience through optional placements and opportunities. You’ll also have the added advantage of excellent prospects and graduate schemes to help propel you into your career, with  Master’s degrees allowing for further specialisation and knowledge advancement.\r\n\r\n'),
(105, 240, 'How will I learn?\r\n', 'On this BSc Accounting and Finance degree, you can expect taught study to be a combination of lectures, seminars and workshops which usually consist of 14 contact hours per week. We recommend that you spend 20 hours per week in self-directed study time, as a full-time student, or usually seven contact hours and ten hours per week in self-directed study time if you are studying part-time.\r\n\r\n'),
(106, 240, 'Will I have to do exams on this Accounting and Finance course?\r\n', 'Yes, there are exams for most of the modules on this course. However, exams do not make up the total grade for the modules and you will do a number of different assignments during your studies. We teach in semesters, which means the exam period is more spread out so you will only be doing 3 exams during an exam period, rather than 6. We offer a lot of support for exams during your module workshops; we do practice questions, mock exams, and prepare you as much as possible for the exams so you feel confident going into them.\r\n\r\n'),
(107, 241, 'How will I learn on the MSc Accounting and Finance?', 'On our MSc in Accounting and Finance, you will typically have nine hours (approx.) of contact time with your tutor in the first semester and 11 hours (approx.) in the second semester. Overall you will spend 108 hours per module in self-directed study (reading and research).\r\n'),
(108, 242, 'How will I learn?', 'Throughout our Digital Marketing and Advertising degree, you can expect taught study to be a combination of lectures, seminars and workshops. This is usually for 12 hours per week. We recommend that you spend 24 hours per week in self-directed study time.\r\n'),
(109, 242, 'How will I be assessed?', 'A variety of individual and group-based assessments are used. This includes reports, presentations, posters, e-portfolios, projects, client briefs, multiple-choice tests and examinations.'),
(112, 244, 'What is the teaching style for the International Marketing Strategy course?', 'Throughout the strategic marketing MSc, you are taught by experienced academic staff with specialist knowledge of their subject areas. Taught modules are delivered using workshop sessions, with a strong emphasis on participation and discussion. To bring concepts and theories to life, extensive use is made of real world case-studies, interactive business simulation software and practical exercises supplemented by extensive online learning materials.\r\n'),
(113, 244, 'What are the assessments for International Marketing Strategy MSc?', 'An innovative range of individual and group-based assessments are used involving the preparation of essays, marketing plans, case study analyses, portfolios and presentations as well as the dissertation.\r\n'),
(114, 245, 'Is the Architectural Technology Top Up course RIBA accredited?', 'This course is not accredited by RIBA. It is accredited by CIAT.'),
(115, 245, 'Can I work in Architectural Practice?', 'Yes, once you’ve completed the degree you could work in Architectural Practice.'),
(116, 245, 'What is the difference between Architectural Technology and Architecture?', 'Architectural Technology is the art of building design, production of working drawings, detailing and specification writing. Architecture, on the other hand, is concerned with building design only. You will only need one degree to become a Chartered Architectural Technologist (through application and interview by CIAT). Whereas to be eligible to apply for Architecture chartership through RIBA you would need in addition to your undergraduate a MArch degree (Masters in Architecture) and a Postgraduate Diploma in Professional Practice.'),
(117, 246, 'How will I be taught?', 'You will be taught in a variety of ways on this biochemistry degree; traditional face to face small seminars, online sessions through our virtual classroom, asynchronously and through additional support sessions.\r\n\r\n'),
(118, 246, 'How many hours per week of teaching/ personal tutoring?', 'You will typically have between 12-14 hours of taught content and an additional hour available with your designated tutor.\r\n\r\n'),
(119, 246, 'How will I be assessed?', 'Each of the 6 modules you study each year will have 2 items of assessment (essentially 12 assessment items each year). These range from; essays, posters, presentations, blogs, graded practical sessions, time constrained essays and exams.\r\n\r\n'),
(120, 246, 'What jobs can I go into from studying this course?', 'Many graduates of the hard sciences tend to stay in the field, many go on to consider MSc or PhD, work for the NHS, laboratories, pharmaceutical industries and the education sector.\r\n\r\n'),
(121, 247, '', ''),
(122, 248, 'How will I learn on this Artificial Intelligence and Data Science degree?', 'While theories are important for AI solutions, we emphasise  practical learning on our BSc Artificial Intelligence and Data Science course. You will be taught through a variety of activities and problem-solving challenges, so that you can apply your theoretical knowledge creatively. Being able to analyse problems, implement data science methods, research solutions, and apply them in new ways are highly valued in the computing industry. Armed with these tools, you will be able to use them throughout your career to drive the industry forward.\r\n\r\n'),
(123, 248, 'How will I be assessed?', 'The AI and Data Science degree uses a range of assessment methods including assignments, portfolios, project reports, and video recordings. This comprehensive testing enables students to demonstrate their strengths in knowledge-based skills.\r\n\r\n'),
(124, 249, 'How will I be taught on the Computing (Computer Networks Engineering) MSc?', 'This pathway teaches students via a mix of theoretical lectures and seminars and more hands-on work. This includes the use of laboratory facilities and computer simulation tools, alongside learning from case studies and practical examples.'),
(125, 249, 'How will I be assessed on the MSc Computing MSc?', 'You will be assessed a number of different ways on this course. This includes coursework, critical reviews and a substantial independent research dissertation. In addition, you will also conduct oral presentations, practical reports, and participate in group work.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `duration` enum('part_time','full_time') NOT NULL,
  `pounds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `program_id`, `location`, `duration`, `pounds`) VALUES
(125, 240, 'Claret Car Park, Edgar Mobbs Way, Sixfields, Northampton, NN5 5JR', 'full_time', 9250),
(126, 240, 'Claret Car Park, Edgar Mobbs Way, Sixfields, Northampton, NN5 5JR', 'part_time', 15200),
(127, 241, '', 'full_time', 8250),
(128, 242, 'Northampton', 'full_time', 9250),
(129, 242, 'Northampton', 'part_time', 15200),
(131, 244, 'Northampton', 'full_time', 8250),
(132, 245, 'Northampton', 'full_time', 9250),
(133, 245, 'Northampton', 'part_time', 16500),
(134, 246, 'Northampton', 'full_time', 9250),
(135, 246, 'Northampton', 'part_time', 15200),
(136, 247, 'Northampton', 'full_time', 8250),
(137, 247, 'Northampton', 'part_time', 16995),
(138, 248, 'Northampton', 'full_time', 9250),
(139, 248, 'Northampton', 'part_time', 15200),
(140, 249, 'Northampton', 'full_time', 8250),
(141, 249, 'Northampton', 'part_time', 16995);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `credits`, `description`, `status`, `code`) VALUES
(9, 'Financial Skills for Business', 20, 'You will have the opportunity to collect, present, analyse and interpret numerical data. You will explore the basic concepts of business mathematics, financial models and statistical methods, which lay the foundation for application of quantitative techniques to support decision making.', '-', 'ACC1025'),
(10, 'Fundamentals of Management Accounting', 20, 'You will apply current and emerging management accounting tools and techniques for controlling, planning and decision making in the modern competitive organisational environment.', '-', 'ACC1026'),
(11, 'Practical Financial Accounting', 20, 'This module introduces you to terminology, concepts, principles, procedures and techniques of accounting. It provides an essential introduction to the preparation and presentation of financial statements and their relevance to stakeholders and other users.', '-', 'ACC1027'),
(12, 'Responsible Accounting ', 20, 'You will explore the principles of responsible accounting built on the foundation of social and environmental justice to promote sustainability within organizations. By applying the sustainable development goals (SDGs), you will explore contemporary global issues related to the transition to responsible business within organisations at international and local levels.', '-', 'ACC1028'),
(13, 'Corporate and Business Law ', 20, 'You will be introduced to the general legal framework related to a range of business activities and appreciate when to seek specialist legal advice.', '-', 'ACC1029'),
(14, 'Digital & Economic Environment', 20, 'You will investigate the economic and digital environment within which accountants and other managers operate. The module equips you with the skills for the use of technology in the management of data and creation of value for organisations.', '-', 'ACC1030'),
(15, 'Financial Management ', 20, 'This module introduces you to the financing decision and the role of the financial manager in modern corporations. Central to the achievement of the above is a sound knowledge of sources of finance (including capital markets) and a clear understanding and application of the techniques that lead to the justifiable investment and dividend decisions.', '-', 'ACC2001'),
(16, 'Digital Business and Finance', 20, 'You will explore the technologies that drive the digital world in which finance operates, and how finance professionals manage data to create and preserve value for organisations. You will examine the skills and competencies framework that finance professionals need to fulfil their roles and to interact with other business areas.', '-', 'ACC2038'),
(17, 'Principles of Taxation', 20, 'You will explore the impact of taxation on the financial strategy of individuals and organisations – commercial and non-commercial, national and international. You will apply taxation rules and regulations to assess the effect on financial decision-making.', '-', 'ACC2040'),
(18, 'Applied Financial Reporting', 20, 'In this module you apply accounting standards and the theoretical framework to the preparation, presentation, and interpretation of financial statements. of companies and groups.', '-', 'ACC2041'),
(19, 'Management Accounting for Decision Making', 20, 'You will apply and evaluate current and emerging management accounting tools and techniques for managing performance to achieve organisational objectives.', '-', 'ACC2042'),
(20, 'The Professional Accountant', 20, 'You will explore the role of professional accountants in organisations, applying relevant professional standards. There is a strong emphasis on the role of governance and accountability on efficient, effective and ethical management of an organisation.', '-', 'ACC2043'),
(21, 'Corporate Finance (Compulsory)', 20, 'The purpose of this module is to equip you with theoretical and practical skills in contemporary corporate finance. You explore the complexities of corporate financial management, investment decision making and financial risk.', '-', 'ACC3009'),
(22, 'Financial Business Partnering (Compulsory)', 20, 'You will analyse and manage costs to support the implementation of the organisation’s strategy and to control the performance of the organisation. You will be able to apply investment appraisal techniques to evaluate capital investments, and evaluate the risks associated with such decisions.\r\n', '-', 'ACC3040'),
(23, 'International Financial Reporting (Compulsory)', 20, 'This module equips you to become skilled preparers, analysts and interpreters of published accounts in light of the IFRS. This includes a synthesis of the accounting policies, contemporary developments in accounting regulation and changes in financial reporting standards.', '-', 'ACC3041'),
(24, 'Practical Auditing (Designated)', 20, 'You will critically explore the legal and regulatory environment of assurance engagement. They will apply professional and ethical considerations to critically identify, analyse and conclude on best practice of accountability and transparency.', '-', 'ACC3042'),
(25, 'Strategy and Leadership (Designated)', 20, 'In this module you adopt a holistic and integrated approach to organisational leadership, from external and internal perspectives. The module is centred on the concept of business and financial strategy and how it can be implemented through people, projects, processes and relationships.', '-', 'ACC3043'),
(26, 'Taxation Practice and Advice (Designated)', 20, 'You will complete complex tax calculations, syntheise and communicate these into professional advice. You will explore taxation regulation and strategies in both public and private sector. You will develop an appreciation of taxation, its effects and interconnectedness to financial decision- making at individual, business, corporate, national and international levels.', '-', 'ACC3044'),
(27, 'Corporate Governance (Designated)', 20, 'The purpose of this module is to examine the practice and key issues of governance within organisations in the national and multinational context.  The module combines theories, codes and regulations, corporate social responsibility and ethics in addressing how modern corporations could adopt effective governance to manage their role and place in the society.\r\n\r\n', '-', 'ACC3017'),
(28, 'Project (Compulsory) ', 20, 'In this module you will analyse organisational performance, examining core areas of accounting and finance to evaluate strategic decision making. You will further enhance their independent research skills through the investigation of real world scenarios to identify trends and propose responsible and sustainable solutions to challenges faced by organisations.', '-', 'ACC4010'),
(29, 'Foundations of Marketing', 20, '-', 'Compulsory', 'MKT1001'),
(30, 'Introduction to Marketing Communications', 20, '-', 'Compulsory', 'MKT1018'),
(31, 'Digital Marketing Essentials', 20, '-', 'Compulsory', 'MKT1029'),
(32, 'Understanding Consumers', 20, '-', 'Compulsory', 'MKT1030'),
(33, 'Professional Skills for Marketing Practice', 20, '-', 'Compulsory', 'MKT1047'),
(34, 'Brand Management', 20, '-', 'Designate', 'MKT2006'),
(35, 'E-Marketing', 20, '-', 'Compulsory', 'MKT2009'),
(36, 'Integrated Marketing Communications', 20, '-', 'Compulsory', 'MKT2011'),
(37, 'Public Relations Management and Practice', 20, '-', 'Designate', 'MKT2012'),
(38, 'Professional Practice for the Creative Industries', 20, '-', 'Compulsory', 'MKT2020'),
(39, 'Managing the Communications Process', 20, '-', 'Compulsory', 'MKT2050'),
(40, 'Marketing Research and Insight', 20, '-', 'Compulsory', 'MKT2059'),
(41, 'Advertising Consultancy Project', 40, '-', 'Designate', 'MKT3036'),
(42, 'Issues in Advertising Practice', 20, '-', 'Compulsory', 'MKT3037'),
(43, 'Content Creation for Marketing', 20, '-', 'Designate', 'MKT3046'),
(44, 'Digital Entrepreneur', 20, '-', 'Designate', 'MKT3049'),
(45, 'Consumerism and Sustainability', 20, '-', 'Designate', 'MKT3051'),
(46, 'Business-to-Business (B2B) Marketing', 20, '-', 'Designate', 'MKT3056'),
(47, 'Marketing Dissertation', 40, '-', 'Designate', 'MKT4001'),
(48, 'Research Project ', 20, '-', 'Designate', 'MKT4002'),
(49, 'Modelling, Simulation and Visualisation', 20, '-', 'Compulsory', '3DD3039'),
(50, 'Project Management in Architecture 1', 20, '-', 'Compulsory', '3DD3048'),
(51, 'Project Management in Architecture 2 ', 20, '-', 'Compulsory', '3DD3049'),
(52, 'Research and Project Design for Architectural Technologists', 20, '-', 'Compulsory', '3DD3050'),
(53, 'Final Major Project', 40, '-', 'Compulsory', '3DD4019'),
(54, 'Dissertation and Research Methods', 60, '-', 'Compulsory', 'FINM025'),
(55, 'Quantitative Methods', 10, '-', 'Compulsory', 'FINM070'),
(56, 'Advanced International Financial Reporting', 20, '-', 'Compulsory', 'FINM085'),
(57, 'Corporate Finance', 20, '-', 'Compulsory', 'FINM086'),
(58, 'Audit, Assurance and Ethics', 20, '-', 'Compulsory', 'FINM087'),
(59, 'Corporate Governance and Sustainability', 20, '-', 'Compulsory', 'FINM088'),
(60, 'Investment Analysis', 10, '-', 'Compulsory', 'FINM089'),
(61, 'Climate Finance and Reporting', 10, '-', 'Compulsory', 'FINM090'),
(62, 'Advanced Management Accounting and Control', 10, '-', 'Compulsory', 'FINM091'),
(63, 'Global Marketing Strategy', 20, '-', 'Compulsory', 'MKTM018'),
(64, 'Dissertation and Research Methods', 60, '-', 'Compulsory', 'MKTM021'),
(65, 'International Marketing Communications', 20, '-', 'Compulsory', 'MKTM026'),
(66, 'Strategic Digital Marketing', 20, '-', 'Compulsory', 'MKTM027'),
(67, 'Global Marketing Issues', 20, '-', 'Compulsory', 'MKTM030'),
(68, 'International Marketing Research', 20, '-', 'Compulsory', 'MKTM031'),
(69, 'Strategic Marketing Management', 20, '-', 'Compulsory', 'MKTM044'),
(70, 'Design Futures: Innovate and Speculate', 30, '-', 'Compulsory', '2DDM001'),
(71, 'Nexus: Past and Future Aligned', 30, '-', 'Compulsory', '2DDM002'),
(72, 'Defining Practice', 30, '-', 'Compulsory', '2DDM003'),
(73, 'Working in the Creative Industries', 30, '-', 'Compulsory', '2DDM004'),
(74, 'Process to Praxis', 60, '-', 'Compulsory', '3DDM013'),
(75, 'Biochemistry and Cell Biology', 20, '-', 'Compulsory', 'SLS1013'),
(76, 'Introduction to Microbiology', 20, '-', 'Compulsory', 'SLS1019'),
(77, 'Genetics and Molecular biology', 20, '-', 'Compulsory', 'SLS1020'),
(78, 'Anatomy and Physiology', 20, '-', 'Compulsory', 'SLS1035'),
(79, 'Biochemical Skills', 20, '-', 'Compulsory', 'SLS1050'),
(80, 'Foundations of Chemistry', 20, '-', 'Compulsory', 'SLS1051'),
(81, 'Genes and Genomics ', 20, '-', 'Designate', 'SLS2001'),
(82, 'Bioscience Research Methods ', 20, '-', 'Compulsory', 'SLS2013'),
(83, 'Processes of Life: Biochemistry', 20, '-', 'Compulsory', 'SLS2016'),
(84, 'Principles of Pharmacology', 20, '-', 'Designate', 'SLS2055'),
(85, 'Applied chemistry', 20, '-', 'Compulsory', 'SLS2056'),
(86, 'Bioinformatics', 20, '-', 'Designate', 'SLS2057'),
(87, 'Physiology 2', 20, '-', 'Designate', 'SLS2058'),
(88, 'Molecular & Cellular Biology', 20, '-', 'Compulsory', 'SLS2060'),
(89, 'Integrated Medical Genetics', 20, '-', 'Designate', 'SLS3002'),
(90, 'Molecular and Cellular Neuroscience', 20, '-', 'Designate', 'SLS3010'),
(91, 'Clinical Biochemistry', 20, '-', 'Compulsory', 'SLS3014'),
(92, 'Gene Regulation', 20, '-', 'Designate', 'SLS3024'),
(93, 'Medical Microbiology', 20, '-', 'Designate', 'SLS3026'),
(94, 'Work based learning', 20, '-', 'Designate', 'SLS3040'),
(95, 'Contemporary Issues in Biochemistry', 20, '-', 'Compulsory', 'SLS3041'),
(96, 'Biochemistry Dissertation', 40, '-', 'Compulsory', 'SLS4013'),
(97, 'Molecular Medicine', 20, '-', '-', 'SLSM012'),
(98, 'Current topics in Molecular Bioscience', 20, '-', '-', 'SLSM015'),
(99, 'Genetics and Genomics', 20, '-', '-', 'SLSM014'),
(100, 'Applied Practice', 40, '-', '-', 'SPOM019'),
(101, 'Molecular Bioscience Dissertation', 60, '-', '-', 'SLSM013'),
(102, 'Research Methods Quantitative Statistical Analyses', 20, '-', '-', 'SLSM011'),
(103, 'Problem Solving and Programming', 20, '-', 'Compulsory', 'CSY1020'),
(104, 'Mathematics for Computer Science', 20, '-', 'Compulsory', 'CSY1060'),
(105, 'Computer Systems', 20, '-', 'Compulsory', 'CSY1061'),
(106, 'Computer Communications', 20, '-', 'Compulsory', 'CSY1062'),
(107, 'Web Development', 20, '-', 'Compulsory', 'CSY1063'),
(108, 'Software Engineering Fundamentals', 20, '-', 'Compulsory', 'CSY1064'),
(109, 'Relational Databases', 20, '-', 'Compulsory', 'CSY2080'),
(110, 'Cloud Computing and Big Data', 20, '-', 'Compulsory', 'CSY2081'),
(111, 'Introduction to Artificial Intelligence', 20, '-', 'Compulsory', 'CSY2082'),
(112, 'Data Structures and Algorithms', 20, '-', 'Compulsory', 'CSY2087'),
(113, 'Group Project', 20, '-', 'Compulsory', 'CSY2088'),
(114, 'Web Programming', 20, '-', 'Compulsory', 'CSY2089'),
(115, 'Natural Language Processing', 20, '-', 'Compulsory', 'CSY3055'),
(116, 'Media Technology ', 20, '-', 'Compulsory', 'CSY3058'),
(117, 'Modern Databases', 20, '-', 'Compulsory', 'CSY3059'),
(118, 'Advanced AI and Applications', 20, '-', 'Compulsory', 'CSY3060'),
(119, 'Computing Project Dissertation', 40, '-', 'Compulsory', 'CSY4022'),
(120, 'Intelligent Systems', 20, '-', 'Designate', 'CSYM015'),
(121, 'Databases', 20, '-', 'Compulsory', 'CSYM017'),
(122, 'Internet Programming', 20, '-', 'Designate', 'CSYM019'),
(123, 'Internet Security', 20, '-', 'Designate', 'CSYM020'),
(124, 'Dissertation', 60, '-', 'Compulsory', 'CSYM023'),
(125, 'Visual Object Software', 20, '-', 'Compulsory', 'CSYM025'),
(126, 'Software Engineering ', 20, '-', 'Designate', 'CSYM026'),
(127, 'Modern Computer Architecture', 20, '-', 'Compulsory', 'CSYM028'),
(128, 'Computer Networks', 20, '-', 'Compulsory', 'CSYM029'),
(129, 'Mobile Device Software Development', 20, '-', 'Compulsory', 'CSYM030');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `name` varchar(100) NOT NULL,
  `degree` enum('bsc','msc','phd') NOT NULL,
  `duration_full_time` int(3) NOT NULL,
  `duration_part_time` int(11) DEFAULT NULL,
  `highlights` text DEFAULT NULL,
  `starting_months` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `logo_url` varchar(500) NOT NULL,
  `social_info` varchar(500) DEFAULT NULL,
  `facilities` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`name`, `degree`, `duration_full_time`, `duration_part_time`, `highlights`, `starting_months`, `content`, `logo_url`, `social_info`, `facilities`, `user_id`, `id`) VALUES
('Accounting and Finance BSc (Hons)', 'bsc', 36, 72, 'The BSc Accounting and Finance degree at the University of Northampton provides a specialised pathway, a proven student support system and has progression courses available. It also offers significant exemptions from the main professional body exams.', 'September', 'Accounting is more than just a computational skill and  the University of Northampton’s Accounting and Finance BSc degree will develop your ability to analyse and evaluate real-life situations and effectively communicate your views and opinions.  The course will begin by considering the practical techniques involved in accounting and finance and then continue to build on skills to critically analyse the theory behind these techniques. It will also develop the interdisciplinary nature of business and integrate accounting with broader subject areas such as economics, law and human resources. There is also the option to complete a year’s accounting and finance work placement to prepare you for your future career.', 'https://www.northampton.ac.uk/wp-content/uploads/2023/12/accounting-and-finance-class-header-1400x550.jpg', '{\"instagram\":\"https://www.instagram.com/accfin_uon/\"}', 'The Learning Hub is at the heart of the campus and home to the student information desk.', 1, 240),
('Accounting and Finance MSc', 'msc', 12, NULL, 'Benefit from the full support of professionally qualified staff.\r\nSome exemptions from professional examinations are available from main professional bodies\r\nIndustry Placement Option available on the masters in Accounting and Finance\r\n', 'September, February', 'The University of Northampton’s MSc Accounting and Finance course provides you with the essential skills needed for pursuing a high level career in finance across all types of organisations; public and private sector, within industry and commerce, both in the UK and abroad.', 'https://www.northampton.ac.uk/wp-content/uploads/2016/01/four-students-working-course-feature.jpg', '{\"instagram\":\"https://www.instagram.com/accfin_uon/\"}', 'The Learning Hub is at the heart of the campus and home to the student information desk.', 1, 241),
('Advertising & Digital Marketing BA (Hons)', 'bsc', 36, 48, 'Numerous opportunities for work experience during the marketing and advertising course.\r\nInvolvement with industry professionals – from top ad agencies, digital media companies and the Digital Northampton network', 'September', 'Experiences are at the heart of our advertising degree. As well as regular guest speakers and industry visits, we work on real projects with real marketing budgets. We operate as a marketing department from the first year. Typically, you will be set a brief and then develop and pitch your concept. You will work within brand guidelines, often appointing suppliers, like photographers or design agencies, to deliver your project.', 'https://www.northampton.ac.uk/wp-content/uploads/2023/12/three-students-booth-library-1400x550.jpg', '{\"instagram\":\"https://www.instagram.com/mkt_adv_digital_uon/\"}', 'When you study a degree in BA Advertising & Digital Marketing with the University of Northampton, you will be able to take advantage of our on-campus facilities, study areas, and services to help support you through your degree.', 1, 242),
('International Marketing Strategy MSc', 'msc', 12, 24, 'This international marketing management course has a 12-month Industry Placement Option.', 'September, February', 'Marketing is no longer just a business function, it is a way of doing business that places the consumer at the centre of organisational activity. Marketing is an essential component of organisational success not only in businesses, but also in the public sector and not-for-profit organisations.', 'https://www.northampton.ac.uk/wp-content/uploads/2016/01/three-students-sitting-course-feature.jpg', '{}', 'If you study a MSc International Marketing Strategy degree with the University of Northampton, you will be able to take advantage of on-campus facilities, study areas, and services.', 1, 244),
('Architectural Technology (Top-Up) BSc (Hons)', 'bsc', 12, 24, 'Course lecturers run their own architectural practices giving up-to-the-moment teaching and professional guidance.\r\nStudents studying for an Architectural Technology degree benefit from our strong links with architectural practices.\r\n', 'September', 'Our Architectural Technology (Top-Up) BSc (Hons) is one of the programmes within the 3-Dimensional Design (3DD) subject area in the Faculty of Arts, Science and Technology (FAST). The Top-Up degree will build upon your project management, design and technical skills. You’ll develop your knowledge of the industry and legislation, experience realistic projects and develop creative skills.', 'https://www.northampton.ac.uk/wp-content/uploads/2023/07/architectural-building-model-1400x550.jpg', '{}', '-', 1, 245),
('Biochemistry BSc (Hons)', 'bsc', 36, 72, 'Modules in emerging subjects such as bioinformatics.\r\nCollaborate with international scientists from both academic and industrial backgrounds.\r\nModules with a large number of practical’s to aid your learning and experience\r\n\r\n', 'September', 'This degree in Biochemistry gives you a firm understanding of the underlying principles for biochemicals reactions that occur within living organisms. There are key biological themes that create the core of this degree that includes, biochemistry, genetics and microbiology.', 'https://www.northampton.ac.uk/wp-content/uploads/2022/07/student-lab-laptop-bench-1400x550.jpg', '{}', 'The University of Northampton boasts a new £330 million campus with state of the art facilities. In the Creative Hub, you will find a well-equipped teaching laboratory with three additional laboratories for research and dissertation projects covering genetics, tissue culture and microbiology. You will also have the Learning Hub and Senate to aid you in your studies, but as a Biochemistry student, you will also have access to the Institute of Creative Leather Technologies which has exceptional chemistry facilities.', 1, 246),
('Molecular Medicine MSc', 'msc', 12, 36, 'Subject specific modules in molecular medicine to meet your career aspirations.\r\nWell-equipped biomedical science laboratories for learning and research.\r\nApply and develop your skills in a practical setting.\r\n', 'September', 'Students study six modules over one year full time, or two years if studying part time on this molecular medicine masters. You will follow subject specific and Research Methods modules and undertake a research project in your area of interest that gives an individual focus, whilst also integrating you into the Molecular Biosciences Research Group within the University’s Research Centre for Physical Activity and Life Sciences. You can find out more about the research interests and expertise of the Bioscience team on the Department of Science research profiles page.', 'https://www.northampton.ac.uk/wp-content/uploads/2022/07/student-lab-bench-purple-gloves-1400x550.jpg', '{}', 'Experienced subject specialists actively researching and publishing in their fields. Opportunities to attend and present research at international conferences.', 1, 247),
('Artificial Intelligence and Data Science BSc (Hons)', 'bsc', 36, 72, 'Progression data science courses available on modern AI and machine learning.\r\nThe BSc Artificial Intelligence degree is a member of Amazon Web Services (AWS) Academy\r\nEmphasis on practical learning to help you develop your strength in the design and development of ethical and responsive AI solutions\r\n', 'September', 'Artificial intelligence and data science have a pivotal role in driving a new era of innovation in many fields. This includes computer science, public health, manufacturing, transportation, and many other areas.', 'https://www.northampton.ac.uk/wp-content/uploads/2024/03/ai-and-computer-science-1400x550.jpg', '{}', 'On the University of Northampton’s BSc Artificial Intelligence and Data Science course, students can benefit from use of a state-of-the-art AI lab with specialised computing equipment to support the design, development, and testing of AI applications.', 1, 248),
('Computing (Computer Networks Engineering) MSc', 'msc', 12, 24, 'Develop analytical skills and business understanding to quickly identify market drivers.\r\nOn the Computer Networks MSc pathway, you will learn the principles of SDN, Cloud networking, Network security and Systems architecture.\r\nYou will familiarize yourself with wireless concepts and will work with cellular communication network architecture.\r\n', 'September, February', 'This programme encompasses a range of modules that delve into the core aspects of Computer Networks Engineering, ensuring you’re well-prepared for the dynamic job market. In the “Internet Security” module, you’ll gain a solid grasp of the principles surrounding computer and internet security, equipping you with the theoretical and practical knowledge needed to implement secure applications within the Internet environment.', 'https://www.northampton.ac.uk/wp-content/uploads/2022/09/three-students-in-front-of-screens-1400x550.jpg', '{}', 'Computing MSc students will benefit from access to around 150 PC and Linux workstation computers. Alongside digital projection facilities, these are all housed in six bespoke computer laboratories, which are maintained by two technicians.', 1, 249);

-- --------------------------------------------------------

--
-- Table structure for table `program_modules`
--

CREATE TABLE `program_modules` (
  `program_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_modules`
--

INSERT INTO `program_modules` (`program_id`, `module_id`) VALUES
(240, 9),
(240, 10),
(240, 11),
(240, 12),
(240, 13),
(240, 14),
(240, 15),
(240, 16),
(240, 17),
(240, 18),
(240, 19),
(240, 20),
(240, 21),
(240, 22),
(240, 23),
(240, 24),
(240, 25),
(240, 26),
(240, 27),
(240, 28),
(241, 54),
(241, 55),
(241, 56),
(241, 57),
(241, 58),
(241, 59),
(241, 60),
(241, 61),
(241, 62),
(242, 29),
(242, 30),
(242, 31),
(242, 32),
(242, 33),
(242, 34),
(242, 35),
(242, 36),
(242, 37),
(242, 38),
(242, 39),
(242, 40),
(242, 41),
(242, 42),
(242, 43),
(242, 44),
(242, 45),
(242, 46),
(242, 47),
(242, 48),
(244, 63),
(244, 64),
(244, 65),
(244, 66),
(244, 67),
(244, 68),
(244, 69),
(245, 49),
(245, 50),
(245, 51),
(245, 52),
(245, 53),
(246, 75),
(246, 76),
(246, 77),
(246, 78),
(246, 79),
(246, 80),
(246, 81),
(246, 82),
(246, 83),
(246, 84),
(246, 85),
(246, 86),
(246, 87),
(246, 88),
(246, 89),
(246, 90),
(246, 91),
(246, 92),
(246, 93),
(246, 94),
(246, 95),
(246, 96),
(247, 97),
(247, 98),
(247, 99),
(247, 100),
(247, 101),
(247, 102),
(248, 103),
(248, 104),
(248, 105),
(248, 106),
(248, 107),
(248, 108),
(248, 109),
(248, 110),
(248, 111),
(248, 112),
(248, 113),
(248, 114),
(248, 115),
(248, 116),
(248, 117),
(248, 118),
(248, 119),
(249, 120),
(249, 121),
(249, 122),
(249, 123),
(249, 124),
(249, 125),
(249, 126),
(249, 127),
(249, 128),
(249, 129);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `program_id`, `type`) VALUES
(95, 241, 'IELTS 6.5 (or equivalent)'),
(96, 242, 'BCC at A Level'),
(97, 242, 'DMM at BTEC'),
(98, 244, 'IELTS 6.5 overall with a minimum of 6.0 in writing and 5.5 in all other skills.'),
(99, 245, 'IELTS 6.0 (or equivalent) with a minimum of 5.5'),
(100, 246, 'BCC at A Level'),
(101, 246, 'DMM at BTEC'),
(102, 247, 'IELTS 6.5 (or equivalent) with a minimum of 5.5'),
(103, 248, 'BCC at A-Level'),
(104, 248, 'DMM at BTEC'),
(105, 249, 'IELTS 6.5 (or equivalent)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@test.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_ibfk_1` (`program_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_ibfk_1` (`program_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_ibfk_1` (`user_id`);

--
-- Indexes for table `program_modules`
--
ALTER TABLE `program_modules`
  ADD KEY `program_modules_ibfk_1` (`module_id`),
  ADD KEY `program_modules_ibfk_2` (`program_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirements_ibfk_1` (`program_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_modules`
--
ALTER TABLE `program_modules`
  ADD CONSTRAINT `program_modules_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_modules_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
