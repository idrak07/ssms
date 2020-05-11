-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 01:05 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicinesupply`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contactno` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `Name`, `Contactno`, `password`) VALUES
(4, 'Square Pharmaceuticals Ltd.', '01533103241', '111111'),
(5, 'Beximco  Pharmaceuticals Ltd.', '01533103242', '111111'),
(6, 'Incepta Pharmaceutical  Ltd.', '01533103243', '111111'),
(7, 'Renata Limited', '01533103244', '111111'),
(8, 'ACI Limited', '01533103245', '111111'),
(9, 'ACME Laboratories  Ltd.', '01533103246', '111111'),
(10, 'Aristopharma Ltd.', '01533103247', '111111'),
(11, 'Globe Pharmaceuticals  Ltd.', '01533103248', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `companyinventories`
--

CREATE TABLE `companyinventories` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `batchno` varchar(30) NOT NULL,
  `quantitybox` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyinventories`
--

INSERT INTO `companyinventories` (`id`, `cid`, `batchno`, `quantitybox`, `mid`, `status`) VALUES
(6, 4, '000001', 98, 19, 'Used'),
(7, 4, '000002', 99, 27, 'Used'),
(8, 4, '0003', 87, 24, 'Used'),
(9, 4, '000004', 49, 25, 'Used'),
(10, 4, '000005', 49, 26, 'Used'),
(11, 4, '000010', 199, 37, 'Used'),
(13, 4, '00012', 10, 24, NULL),
(14, 4, '0077', 49, 28, 'Used'),
(15, 6, 'Dobesil01', 118, 31, 'Used'),
(16, 6, 'Methsolon01', 119, 36, 'Used'),
(17, 6, 'Methsolon/16/01', 119, 33, 'Used'),
(18, 6, 'Methsolon/4/01', 139, 32, 'Used'),
(19, 6, 'Methsolon/40/01', 49, 34, 'Used'),
(20, 6, 'Methsolon/500/01', 49, 35, 'Used'),
(21, 6, 'reset101', 125, 21, 'Used'),
(22, 6, 'reset201', 137, 22, 'Used'),
(23, 6, 'reset301', 146, 23, 'Used'),
(24, 5, 'napa001', 94, 20, 'Used'),
(25, 5, 'Gensulin N/001', 48, 29, 'Used'),
(26, 5, 'Gensulin R/001', 26, 30, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `companytax`
--

CREATE TABLE `companytax` (
  `id` int(11) NOT NULL,
  `ammount` float NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `lastdeposited` date DEFAULT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companytax`
--

INSERT INTO `companytax` (`id`, `ammount`, `status`, `lastdeposited`, `cid`) VALUES
(1, 1062.63, NULL, NULL, 4),
(2, 1044.3, NULL, NULL, 5),
(3, 728.85, NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contactno` varchar(12) DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `contactno`, `designation`) VALUES
(1, 'Dr. XYZ', '01533103261', 'Neurologist'),
(2, 'Dr. Arnob', '01533103262', 'Neurologist');

-- --------------------------------------------------------

--
-- Table structure for table `generics`
--

CREATE TABLE `generics` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generics`
--

INSERT INTO `generics` (`id`, `name`, `description`) VALUES
(1, 'Paracetamol', 'Paracetamol (acetaminophen) is a pain reliever and a fever reducer. The exact mechanism of action of is not known.\r\n\r\nParacetamol is used to treat many conditions such as headache, muscle aches, arthritis, backache, toothaches, colds, and fevers. It relieves pain in mild arthritis but has no effect on the underlying inflammation and swelling of the joint.\r\n\r\nParacetamol may also be used for other purposes not listed in this medication guide.'),
(2, 'Clotrimazole', 'Clotrimazole, sold under the brand name Canesten among others, is an antifungal medication.[1] It is used to treat vaginal yeast infections, oral thrush, diaper rash, pityriasis versicolor, and types of ringworm including athlete''s foot and jock itch.[1] It can be taken by mouth or applied as a cream to the skin or in the vagina.[1]\r\n\r\nCommon side effects when taken by mouth include nausea and itchiness.[1] When applied to the skin, common side effects include redness and burning.[1] In pregnancy, use on the skin or in the vagina is believed to be safe.[1] There is no evidence of harm when used by mouth during pregnancy but this has been less well studied.[1] When used by mouth, greater care should be taken in those with liver problems.[1] It is in the azole class of medications and works by disrupting the fungal cell membrane.[1]'),
(3, 'Antiallergic', 'An antiallergic substance prevents or relieves allergies. An antiallergic drug can be used to relieve hayfever and other allergic reactions. Antiallergic drugs temporarily relieve the symptoms of allergic reactions. An antiallergic substance prevents or relieves allergies.'),
(4, 'Olopatadine HCl', 'Olopatadine is an antihistamine that reduces the natural chemical histamine in the body. Histamine can produce symptoms of itching or watery eyes. Olopatadine ophthalmic (for the eye) is used to treat itching, burning, redness, watering, and other eye symptoms caused by allergic conditions.'),
(5, 'ketotifen fumarate', 'This medication is used to prevent and treat itching of the eyes caused by allergies (allergic/seasonal conjunctivitis). Ketotifen is an antihistamine for the eye that treats allergic symptoms by blocking a certain natural substance (histamine)'),
(6, 'Albendazole', 'Albendazole, also known as albendazolum, is a medication used for the treatment of a variety of parasitic worm infestations. It is useful for giardiasis, trichuriasis, filariasis, neurocysticercosis, hydatid disease, pinworm disease, and ascariasis, among others. It is taken by mouth. '),
(7, 'Clopidogrel', 'Clopidogrel, sold under the trade name Plavix among others, is an antiplatelet medication used to reduce the risk of heart disease and stroke in those at high risk. It is also used together with aspirin in heart attacks and following the placement of a coronary artery stent. It is taken by mouth'),
(8, 'Sodium Alginate', 'Alginic acid, also called algin, is a polysaccharide distributed widely in the cell walls of brown algae that is hydrophilic and forms a viscous gum when hydrated. With metals such as sodium and calcium, its salts are known as alginates.'),
(9, 'Fluticasone Furoate', 'Fluticasone furoate is a corticosteroid for the treatment of non-allergic and allergic rhinitis administered by a nasal spray. It is also available as an inhaled corticosteroid to help prevent and control symptoms of asthma. It is derived from cortisol.'),
(10, 'Insulin Human (rDNA)', 'Inhaled human insulin ((insulin human [rDNA origin]) Inhalation Powder) is a prandial insulin approved in the EU and the US for the treatment of adults with diabetes. ... Availability of inhaled insulin may increase insulin acceptance and thus improve glycaemic control in patients with diabetes.'),
(11, 'Vasoprotective\r\n', 'A vasoprotective is a medication which acts to alleviate or prevent conditions or diseases which affect the blood vessels. The term is used in the World Health Organization''s Anatomical Therapeutic Chemical Classification System to encompass therapeutic agents used in the treatment of hemorrhoids or varicose veins.'),
(12, 'Glucocorticoid', 'Glucocorticoids are a class of corticosteroids, which are a class of steroid hormones. Glucocorticoids are corticosteroids that bind to the glucocorticoid receptor that is present in almost every vertebrate animal cell. '),
(13, 'Equipment', 'There are several basic types: Diagnostic equipment includes medical imaging machines, used to aid in diagnosis. ... Treatment equipment includes infusion pumps, medical lasers and LASIK surgical machines. Life support equipment is used to maintain a patient''s bodily function.');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(5000) NOT NULL,
  `price` float NOT NULL,
  `cid` int(11) NOT NULL,
  `genericid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `mg` int(11) DEFAULT NULL,
  `mrp` float DEFAULT NULL,
  `unitperbox` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `details`, `price`, `cid`, `genericid`, `typeid`, `mg`, `mrp`, `unitperbox`, `status`) VALUES
(19, 'Ace Plus®', 'Indication:\r\nFever, headache, migraine, muscle ache, backache, toothache & menstrual pain.\r\n\r\nDosage & Administration:\r\nAdults: 1-2 tablets every 4-6 hours. Maximum dose: 8 tablets daily. Not recommended for children below 12 years.\r\n\r\nPreparation:\r\nEach box contains 200 tablets of Paracetamol 500 mg & Caffeine 65 mg in a blister pack.', 415.5, 4, 1, 2, 500, 3.5, 200, 'Listed'),
(20, 'Napa Extend', 'Napa® Extend is the preparation of Paracetamol 665 mg extended release formulation. It is formulated by dual granulation technology. There are two types’ granules in each tablet 31% (206 mg) is in immediate release form for immediate action and 69% (459 mg) in sustain release form for continuous pain relief for 8 hours.\r\nParacetamol 665 mg Extended Release tablet is effective for the relief of persistent pain associated with osteoarthritis and muscle aches and pains such as backache. Paracetamol 665 mg Extended Release tablet also provides effective, temporary relief of pain and discomfort associated with headache, tension headache, period pain, toothache and pain after dental procedures, and cold & flu. Reduces fever.', 215.5, 5, 1, 2, 665, 1, 250, 'Listed'),
(21, 'Reset', 'Description\r\nReset (Paracetamol) is a fast acting and safe analgesic with marked antipyretic property. It is specially suitable for patients who, for any reason, can not tolerate aspirin or other analgesics.\r\n\r\nIndications\r\nAll conditions requiring relief from pain and fever such as neuritis, neuralgia, headache, toothache, earache, body ache, myalgia, minor arthritis pain, pain due to rheumatic disorder, cold, influenza, dysmenorrhoea etc.\r\n\r\nDosage & Administration\r\nTablet\r\nAdult: 1 - 2 tablets every 4 to 6 hours up to a maximum of 4 g (8 tablets) daily\r\nChildren (6 - 12 years) : 1/2 to 1 tablet 3 to 4 times daily\r\nSyrup\r\nChildren: 2 months: 60 mg (1/2 measuring spoonful) for post immunization pyrexia;\r\nUnder 3 months (on doctor''s advice only) : 10 mg/kg (5 mg/kg if jaundiced)\r\n3 months - 1 year : 60 - 120 mg (1/2 - 1 measuring spoonful),\r\n1 - 5 years : 1 - 2 measuring spoonful\r\n6 - 12 years : 2 - 4 measuring spoonful\r\nPaediatric Drops\r\n2 months: 60 mg for post-immunization pyrexia; under 3 months (on doctors advice only), 10 mg/kg (5 mg/kg if jaundiced); 3 months- 1 year: 60-120 mg; 1 - 5 years: 120-250 mg.\r\n\r\nPaediatric drops may be given to children and neonates according to following guideline:\r\n\r\nAge	Dose of Paediatric Drops\r\n0-3 months	0.5 ml (upto 4 times daily)\r\n4-11 months	1 ml (upto 4 times daily)\r\n12-23 months	1.5 ml (upto 4 times daily)\r\n2-3 years	2 ml (upto 4 times daily)\r\n4-5 months	3 ml (upto 4 times daily)\r\n\r\nSide Effects\r\nSide effects of paracetamol are usually mild, though haematological reactions including thrombocytopenia, leukopenia, pancytopenia, neutropenia, and agranulocytosis have been reported. Pancreatitis, skin rashes, and other allergic reactions occur occasionally.\r\n\r\nPrecautions\r\nParacetamol should be given with care to patients with impaired kidney or liver function. Paracetamol should be given with care to patients taking other drugs that affect the liver.\r\n\r\nOver Dose\r\nSymptoms of Paracetamol overdose in the first 24 hours are pallor, nausea, vomiting, anorexia and abdominal pain. Liver damage may become apparent 12 to 40 hours after ingestion. Abnormalities of glucose metabolism and metabolic acidosis may occur.\r\n\r\nCommercial Pack\r\nReset: Box containing 20 blister strips of 10 tablets.\r\nReset Syrup: Bottle containing 60 ml syrup.\r\nReset Paediatric Drops: Bottle containing 15 ml Paediatric Drops.', 317.5, 6, 1, 2, 500, 1, 350, 'Listed'),
(22, 'Reset', 'Description\r\nReset (Paracetamol) is a fast acting and safe analgesic with marked antipyretic property. It is specially suitable for patients who, for any reason, can not tolerate aspirin or other analgesics.\r\n\r\nIndications\r\nAll conditions requiring relief from pain and fever such as neuritis, neuralgia, headache, toothache, earache, body ache, myalgia, minor arthritis pain, pain due to rheumatic disorder, cold, influenza, dysmenorrhoea etc.\r\n\r\nDosage & Administration\r\nTablet\r\nAdult: 1 - 2 tablets every 4 to 6 hours up to a maximum of 4 g (8 tablets) daily\r\nChildren (6 - 12 years) : 1/2 to 1 tablet 3 to 4 times daily\r\nSyrup\r\nChildren: 2 months: 60 mg (1/2 measuring spoonful) for post immunization pyrexia;\r\nUnder 3 months (on doctor''s advice only) : 10 mg/kg (5 mg/kg if jaundiced)\r\n3 months - 1 year : 60 - 120 mg (1/2 - 1 measuring spoonful),\r\n1 - 5 years : 1 - 2 measuring spoonful\r\n6 - 12 years : 2 - 4 measuring spoonful\r\nPaediatric Drops\r\n2 months: 60 mg for post-immunization pyrexia; under 3 months (on doctors advice only), 10 mg/kg (5 mg/kg if jaundiced); 3 months- 1 year: 60-120 mg; 1 - 5 years: 120-250 mg.\r\n\r\nPaediatric drops may be given to children and neonates according to following guideline:\r\n\r\nAge	Dose of Paediatric Drops\r\n0-3 months	0.5 ml (upto 4 times daily)\r\n4-11 months	1 ml (upto 4 times daily)\r\n12-23 months	1.5 ml (upto 4 times daily)\r\n2-3 years	2 ml (upto 4 times daily)\r\n4-5 months	3 ml (upto 4 times daily)\r\n\r\nSide Effects\r\nSide effects of paracetamol are usually mild, though haematological reactions including thrombocytopenia, leukopenia, pancytopenia, neutropenia, and agranulocytosis have been reported. Pancreatitis, skin rashes, and other allergic reactions occur occasionally.\r\n\r\nPrecautions\r\nParacetamol should be given with care to patients with impaired kidney or liver function. Paracetamol should be given with care to patients taking other drugs that affect the liver.\r\n\r\nOver Dose\r\nSymptoms of Paracetamol overdose in the first 24 hours are pallor, nausea, vomiting, anorexia and abdominal pain. Liver damage may become apparent 12 to 40 hours after ingestion. Abnormalities of glucose metabolism and metabolic acidosis may occur.\r\n\r\nCommercial Pack\r\nReset: Box containing 20 blister strips of 10 tablets.\r\nReset Syrup: Bottle containing 60 ml syrup.\r\nReset Paediatric Drops: Bottle containing 15 ml Paediatric Drops.', 1340, 6, 1, 1, 120, 100, 15, 'Listed'),
(23, 'Reset', 'Description\r\nReset (Paracetamol) is a fast acting and safe analgesic with marked antipyretic property. It is specially suitable for patients who, for any reason, can not tolerate aspirin or other analgesics.\r\n\r\nIndications\r\nAll conditions requiring relief from pain and fever such as neuritis, neuralgia, headache, toothache, earache, body ache, myalgia, minor arthritis pain, pain due to rheumatic disorder, cold, influenza, dysmenorrhoea etc.\r\n\r\nDosage & Administration\r\nTablet\r\nAdult: 1 - 2 tablets every 4 to 6 hours up to a maximum of 4 g (8 tablets) daily\r\nChildren (6 - 12 years) : 1/2 to 1 tablet 3 to 4 times daily\r\nSyrup\r\nChildren: 2 months: 60 mg (1/2 measuring spoonful) for post immunization pyrexia;\r\nUnder 3 months (on doctor''s advice only) : 10 mg/kg (5 mg/kg if jaundiced)\r\n3 months - 1 year : 60 - 120 mg (1/2 - 1 measuring spoonful),\r\n1 - 5 years : 1 - 2 measuring spoonful\r\n6 - 12 years : 2 - 4 measuring spoonful\r\nPaediatric Drops\r\n2 months: 60 mg for post-immunization pyrexia; under 3 months (on doctors advice only), 10 mg/kg (5 mg/kg if jaundiced); 3 months- 1 year: 60-120 mg; 1 - 5 years: 120-250 mg.\r\n\r\nPaediatric drops may be given to children and neonates according to following guideline:\r\n\r\nAge	Dose of Paediatric Drops\r\n0-3 months	0.5 ml (upto 4 times daily)\r\n4-11 months	1 ml (upto 4 times daily)\r\n12-23 months	1.5 ml (upto 4 times daily)\r\n2-3 years	2 ml (upto 4 times daily)\r\n4-5 months	3 ml (upto 4 times daily)\r\n\r\nSide Effects\r\nSide effects of paracetamol are usually mild, though haematological reactions including thrombocytopenia, leukopenia, pancytopenia, neutropenia, and agranulocytosis have been reported. Pancreatitis, skin rashes, and other allergic reactions occur occasionally.\r\n\r\nPrecautions\r\nParacetamol should be given with care to patients with impaired kidney or liver function. Paracetamol should be given with care to patients taking other drugs that affect the liver.\r\n\r\nOver Dose\r\nSymptoms of Paracetamol overdose in the first 24 hours are pallor, nausea, vomiting, anorexia and abdominal pain. Liver damage may become apparent 12 to 40 hours after ingestion. Abnormalities of glucose metabolism and metabolic acidosis may occur.\r\n\r\nCommercial Pack\r\nReset: Box containing 20 blister strips of 10 tablets.\r\nReset Syrup: Bottle containing 60 ml syrup.\r\nReset Paediatric Drops: Bottle containing 15 ml Paediatric Drops.', 1620, 6, 1, 5, 80, 90, 20, 'Listed'),
(24, 'Afun®', 'Indication:\r\nDermatomycoses due to candida, trichophyton, moulds and other fungi, skin diseases showing superinfections with these fungi e.g. inter digital mycoses, paronychia, candida vulvitis, balanitis, pityriasis versicolor and erythrasma.\r\n\r\nDosage & Administration:\r\n2-3 times daily.\r\n\r\nPreparation:\r\n10 mg/gm Cream.', 850, 4, 2, 8, 10, 10, 100, 'Listed'),
(25, 'Alacot® DS Eye Drops', 'Indication:\r\nIndicated for the treatment of the signs and symptoms of allergic conjunctivitis\r\n\r\nDosage & Administration:\r\nOne drop in each affected eye once a day\r\n\r\nPreparation:\r\n0.2% Eye Drops', 2000.5, 4, 3, 5, NULL, 270, 10, 'Listed'),
(26, 'Alacot® Eye Drops', 'Indication:\r\nIndicated for the treatment of the signs and symptoms of allergic conjunctivitis.\r\n\r\nDosage & Administration:\r\nOne drop in each affected eye two times per day at an interval of 6 to 8 hours.\r\n\r\nPreparation:\r\n0.1% Eye Drops.', 1330.5, 4, 4, 5, NULL, 140, 10, 'Listed'),
(27, 'Acetram®', 'Indication:\r\nManagement of moderate to moderately sever pain in adults & also indicated for the short-term (five days or less) management of acute.\r\n\r\nDosage & Administration:\r\nAcetram tablet can be administered without regard to food. For the management of pain, the recommended dose is 1 or 2 tablets every 4 to 6 hours as needed for pain relief up to a maximum of 8 tablets per day. In case of short-term (five days or less) management of acute pain, the recommended dose is 2 tablets every 4 to 6 hours as needed for pain relief up to maximum of 8 tablets per day.\r\n\r\nPreparation:\r\nEach box contains 30 tablets of Paracetamol 325 mg & Tramadol Hydrochloride 37.5 mg in a blister pack.', 520, 4, 1, 2, 325, 3.5, 200, 'Listed'),
(28, 'Ansulin® Vial', 'Indication:\r\nType 1 and Type 2 Diabetes Mellitus.\r\n\r\nDosage & Administration:\r\nThe dosage form, the dosage and the administration time of the insulin are different due to the\r\nindividual differences of each patient. In addition, the dosage is also affected by food, working style\r\nand exercising intensity. Therefore, patients should use the insulin under doctor\\''s instruction.\r\nThe average range of total daily insulin requirement for maintenance therapy in type 1 diabetic\r\npatients lies between 0.5 and 1.0 IU/kg. In pre-pubertal children it usually varies from 0.7 to 1.0\r\nIU/kg, whereas in insulin resistant cases, e.g. during puberty or due to obesity, the daily insulin\r\nrequirement may be substantially higher. Initial dosages for type 2 diabetic patients are often lower,\r\ne.g. 0.3 to 0.6 IU/kg/day.', 3780, 4, 10, 7, NULL, 220, 20, 'Listed'),
(29, 'Gensulin N', 'WHAT GENSULIN® N IS AND WHAT IT IS USED FOR?\r\nGENSULIN® N contains human insulin produced by DNA recombination using bacteria Escherichia coli. The insulin is identical to insulin produced by human organism. Insulin is a hormone secreted in the human pancreas. It is involved in carbohydrate, fat and protein metabolism and causes, among others, blood glucose reduction. Insulin deficiency leads to diabetes. Insulin administered in injections acts identically to the hormone produced by the human body.\r\nGENSULIN® N is presented in 10 ml vials used with a special syringe or in 3 ml cartridges used with an insulin administration device.\r\nGENSULIN® N (isophane suspension) is a long-acting insulin. The onset (blood sugar reduction) occurs within 1.5 h from injection, the peak action-between 3 and 10 h (depending on the dose) and the duration is 24 h.', 4556.5, 5, 10, 7, NULL, 320, 15, 'Listed'),
(30, 'Gensulin R', 'WHAT GENSULIN® R IS AND WHAT IT IS USED FOR?\r\nGENSULIN® R contains human insulin produced by DNA recombination using bacteria Escherichia coli. The insulin is identical to insulin produced by human organism.\r\nInsulin is a hormone secreted in the human pancreas. It is involved in carbohydrate, fat and protein metabolism and causes, among others, blood glucose reduction. Insulin deficiency leads to diabetes. Insulin administered in injections acts identically to the hormone produced by the human body.\r\nGENSULIN® R is presented in 10 ml vials used with a special syringe or in 3 ml cartridges used with an insulin administration device.\r\nGENSULIN® R (solution) is a short-acting insulin. The onset (blood sugar reduction) occurs within 30 minutes from injection, the peak action – after 1-3 h and the hypoglycaemic action (reduced blood glucose) is maintained for 8 h and depends on the dose size.', 2620, 5, 10, 7, NULL, 330, 10, 'Listed'),
(31, 'Dobesil(Calcium Dobesilate Capsule)', 'Presentation\r\nDobesil TM Capsules: Each capsule contains Calcium Dobesilate Monohydrate BP equivalent to Calcium Dobesilate 500 mg\r\n\r\nDescription\r\nCalcium Dobesilate is a vasoactive drug that presumes effects on endothelial integrity, capillary permeability and blood viscosity. It decreases capillary hyperpermeability, decreases platelet aggregation (clotting - adhesion of platelets) and reduces the serum viscosity, which improves blood circulation and blood supply to tissues and organs.\r\n\r\nIndications\r\nDobesil is indicated for the treatment of hemorrhoidal syndrome, microcirculation disorders of arteovenous origin, clinical signs of chronic venous insufficiency in the lower limbs (pain, cramps, paresthesia, edema, stasis, dermotosis) and in the particular microangiopathy like diabetic retinopathy. It is also indicated in superficial thrombophlebitis as adjuvant therapy.\r\n\r\nDosage & Administration\r\nDobesil capsule once or twice daily should be taken with the main meal. Treatment duration, which generally between a few weeks to several months, depends on the disease and its evolution. Dosage should be adapted individually according to the severity of the disease.\r\n\r\nSide Effects\r\nRarely gastrointestinal disorders including nausea and diarrhea, skin reactions, fever, articular pain and in very rare cases agranulocytosis have been reported. These reactions are generally spontaneously reversible after treatment withdrawal.\r\n\r\nPrecautions\r\nDosage should be reduced in case of severe renal insufficiency requiring dialysis. In patient with agranulocytosis, this medication can decrease the number of white blood cells which affect the body’s ability to fight against various infections. If patients experience flu-like symptoms such as cough, sore throat, fever and others, they are advised to seek medical care as soon as possible.\r\n\r\nUse in Pregnancy & Lactation\r\nThe safety of Calcium Dobesilate during pregnancy and lactation has not been established. As it is not known whether calcium dobesilate crosses the placental barrier in humans, the drug should be administered during pregnancy only if the benefit to the mother outweighs the potential risk to the fetus. Avoid breastfeeding while using this medicine.\r\nOver Dose\r\nThe clinical signs of a possible overdose are not known. If overdose occurs, seek medical advice immediately.\r\n\r\nStorage\r\nStore in a cool and dry place, away from light. Keep out of the reach of children.\r\n\r\nCommercial Pack\r\nDobesil TM Capsules: Each box contains 3 Alu-PVDC blister strips of 10 capsules', 690.5, 6, 11, 3, 500, 15, 50, 'Listed'),
(32, 'Methsolon 4', 'MethsolonTM contain methylprednisolone which is a glucocorticoid. Glucocorticoids are adrenocortical steroids, both naturally occurring and synthetic, which are readily absorbed from the gastrointestinal tract. It has greater anti-inflammatory potency and less mineralocorticoid potency than Prednisolone. The relative potency of Methylprednisolone is to Hydrocortisone is at least 4 to 1. The bio-availability of methylprednisolone is 82-89% following oral administration. Maximum plasma concentration in blood is achieved in around 1.5 to 2.3 hours in healthy adults.The volume of distribution is 41-61.5 L. It crosses the blood-brain barrier, placenta and is excreted in the breast milk. The plasma protein binding in human is linear and approximately 77%. No dosage adjustment is required in renal failure.', 1100, 6, 12, 2, 4, 12, 100, 'Listed'),
(33, 'Methsolon 16', 'MethsolonTM contain methylprednisolone which is a glucocorticoid. Glucocorticoids are adrenocortical steroids, both naturally occurring and synthetic, which are readily absorbed from the gastrointestinal tract. It has greater anti-inflammatory potency and less mineralocorticoid potency than Prednisolone. The relative potency of Methylprednisolone is to Hydrocortisone is at least 4 to 1. The bio-availability of methylprednisolone is 82-89% following oral administration. Maximum plasma concentration in blood is achieved in around 1.5 to 2.3 hours in healthy adults.The volume of distribution is 41-61.5 L. It crosses the blood-brain barrier, placenta and is excreted in the breast milk. The plasma protein binding in human is linear and approximately 77%. No dosage adjustment is required in renal failure.', 1800.5, 6, 12, 2, 16, 22, 100, 'Listed'),
(34, 'Methsolon 40 IV/IM injection', 'MethsolonTM contain methylprednisolone which is a glucocorticoid. Glucocorticoids are adrenocortical steroids, both naturally occurring and synthetic, which are readily absorbed from the gastrointestinal tract. It has greater anti-inflammatory potency and less mineralocorticoid potency than Prednisolone. The relative potency of Methylprednisolone is to Hydrocortisone is at least 4 to 1. The bio-availability of methylprednisolone is 82-89% following oral administration. Maximum plasma concentration in blood is achieved in around 1.5 to 2.3 hours in healthy adults.The volume of distribution is 41-61.5 L. It crosses the blood-brain barrier, placenta and is excreted in the breast milk. The plasma protein binding in human is linear and approximately 77%. No dosage adjustment is required in renal failure.', 1400, 6, 12, 7, 0, 380, 5, 'Listed'),
(35, 'Methsolon 500 IV/IM injection', 'MethsolonTM contain methylprednisolone which is a glucocorticoid. Glucocorticoids are adrenocortical steroids, both naturally occurring and synthetic, which are readily absorbed from the gastrointestinal tract. It has greater anti-inflammatory potency and less mineralocorticoid potency than Prednisolone. The relative potency of Methylprednisolone is to Hydrocortisone is at least 4 to 1. The bio-availability of methylprednisolone is 82-89% following oral administration. Maximum plasma concentration in blood is achieved in around 1.5 to 2.3 hours in healthy adults.The volume of distribution is 41-61.5 L. It crosses the blood-brain barrier, placenta and is excreted in the breast milk. The plasma protein binding in human is linear and approximately 77%. No dosage adjustment is required in renal failure.', 1900, 6, 12, 7, 500, 410, 5, 'Listed'),
(36, 'Methsolon 1 gm IV/IM injection', 'MethsolonTM contain methylprednisolone which is a glucocorticoid. Glucocorticoids are adrenocortical steroids, both naturally occurring and synthetic, which are readily absorbed from the gastrointestinal tract. It has greater anti-inflammatory potency and less mineralocorticoid potency than Prednisolone. The relative potency of Methylprednisolone is to Hydrocortisone is at least 4 to 1. The bio-availability of methylprednisolone is 82-89% following oral administration. Maximum plasma concentration in blood is achieved in around 1.5 to 2.3 hours in healthy adults.The volume of distribution is 41-61.5 L. It crosses the blood-brain barrier, placenta and is excreted in the breast milk. The plasma protein binding in human is linear and approximately 77%. No dosage adjustment is required in renal failure.', 1800, 6, 12, 7, 1000, 430, 5, 'Listed'),
(37, 'Larsulin™', 'Indication:\r\nType 1 and Type 2 Diabetes Mellitus.\r\n\r\nDosage & Administration:\r\nLarsulin™ exhibits a relatively constant glucose-lowering profile over 24 hours that permits once-daily dosing. Potency of insulin glargine is approximately the same as human insulin. Larsulin™ is recommended for once daily subcutaneous administration & may be administered at any time during the day. However, once started should be administered at the same time every day. The dose of Larsulin™ must be individualized based on clinical response. Blood glucose monitoring is essential in all patients with diabetes. In patients with type 1 diabetes, Larsulin™ must be used in regimens with short-acting insulin. Larsulin™ is not recommended for intravenous adminiShow more \r\n\r\n\r\nPreparation:\r\nLarsulin™ Injection: Each box contains 3 ml glass vial.\r\nLarsulin™ Pen Cartridge: Each box contains 3 ml glass Cartridge.', 1740.5, 4, 10, 7, NULL, 230, 10, 'Listed'),
(38, 'xyz', 'xyz', 100, 4, 2, 2, 5, 6, 20, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `ordercarts`
--

CREATE TABLE `ordercarts` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `oid` int(11) NOT NULL,
  `batchid` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordercarts`
--

INSERT INTO `ordercarts` (`id`, `mid`, `quantity`, `total`, `oid`, `batchid`) VALUES
(1, 19, 2, 831, 1, '6'),
(2, 27, 1, 520, 1, '7'),
(3, 24, 2, 1700, 1, '8'),
(4, 25, 1, 2000.5, 1, '9'),
(5, 26, 1, 1330.5, 1, '10'),
(6, 28, 1, 3780, 1, '14'),
(7, 37, 1, 1740.5, 1, '11'),
(9, 31, 2, 1381, 3, '15'),
(10, 36, 1, 1800, 3, '16'),
(11, 33, 1, 1800.5, 3, '17'),
(12, 32, 1, 1100, 3, '18'),
(13, 34, 1, 1400, 3, '19'),
(14, 35, 1, 1900, 3, '20'),
(15, 21, 5, 1587.5, 3, '21'),
(16, 22, 3, 1920, 3, '22'),
(17, 23, 4, 1688, 3, '23'),
(19, 24, 11, 9350, 5, '8'),
(20, 29, 1, 4556.5, 6, '25'),
(21, 30, 2, 5240, 6, '26'),
(22, 20, 3, 646.5, 6, '24'),
(23, 29, 1, 4556.5, 7, '25'),
(24, 30, 2, 5240, 7, '26'),
(25, 20, 3, 646.5, 7, '24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `placeddate` date NOT NULL,
  `deliverydate` date DEFAULT NULL,
  `time` time NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `placeddate`, `deliverydate`, `time`, `cid`, `pid`, `total`, `status`) VALUES
(1, '2020-05-07', '2020-05-07', '12:28:27', 4, 1, 11902.5, 'Confirmed'),
(3, '2020-05-07', '2020-05-07', '12:31:00', 6, 1, 14577, 'Confirmed'),
(5, '2020-05-07', '2020-05-07', '13:46:08', 4, 1, 9350, 'Confirmed'),
(6, '2020-05-07', '2020-05-07', '14:05:31', 5, 2, 10443, 'Confirmed'),
(7, '2020-05-07', '2020-05-07', '14:09:23', 5, 2, 10443, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Contactno` varchar(11) NOT NULL,
  `marketname` varchar(200) NOT NULL,
  `road` varchar(50) NOT NULL,
  `district` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`Id`, `UserName`, `Password`, `Contactno`, `marketname`, `road`, `district`) VALUES
(1, 'Lazz Pharma', '111111', '01533103251', 'Green Tower', 'SSK Road', 'Feni'),
(2, 'ABC Pharma', '111111', '01533103252', 'ABC Shopping Mall', '2', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacyinventories`
--

CREATE TABLE `pharmacyinventories` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacyinventories`
--

INSERT INTO `pharmacyinventories` (`id`, `mid`, `unit`, `pid`) VALUES
(1, 19, 330, 1),
(2, 27, 190, 1),
(3, 24, 1280, 1),
(4, 25, 9, 1),
(5, 26, 7, 1),
(6, 28, 20, 1),
(7, 37, 10, 1),
(8, 31, 100, 1),
(9, 36, 0, 1),
(10, 33, 90, 1),
(11, 32, 90, 1),
(12, 34, 5, 1),
(13, 35, 5, 1),
(14, 21, 1720, 1),
(15, 22, 718, 1),
(16, 23, 850, 1),
(17, 29, 25, 2),
(18, 30, 35, 2),
(19, 20, 1480, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacytax`
--

CREATE TABLE `pharmacytax` (
  `id` int(11) NOT NULL,
  `ammount` float NOT NULL DEFAULT '0',
  `status` varchar(20) DEFAULT NULL,
  `lastdeposited` date DEFAULT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacytax`
--

INSERT INTO `pharmacytax` (`id`, `ammount`, `status`, `lastdeposited`, `pid`) VALUES
(1, 199.25, NULL, NULL, 1),
(2, 163.5, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptionitems`
--

CREATE TABLE `prescriptionitems` (
  `id` int(11) NOT NULL,
  `prescriptionid` int(11) NOT NULL,
  `medicinename` varchar(300) NOT NULL,
  `morning` varchar(100) NOT NULL DEFAULT '0',
  `afternoon` varchar(100) NOT NULL DEFAULT '0',
  `evening` varchar(100) NOT NULL DEFAULT '0',
  `meal` varchar(20) DEFAULT NULL,
  `days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptionitems`
--

INSERT INTO `prescriptionitems` (`id`, `prescriptionid`, `medicinename`, `morning`, `afternoon`, `evening`, `meal`, `days`) VALUES
(1, 1, 'TAB:Reset(500mg)', '1', '1', '1', 'After Meal', 7),
(2, 1, 'TAB:Afun(10)', '0', '0', '1', 'After Meal', 7),
(4, 1, 'TAB:Ace(500mg)', '1', '0', '1', 'After Meal', 10),
(5, 4, 'TAB:Ace(500mg)', '1', '0', '1', 'After Meal', 10),
(6, 4, 'TAB:Afun(10)', '0', '0', '1', 'Before Meal', 15),
(7, 4, 'TAB:Reset(500mg)', '1', '0', '1', 'After Meal', 10),
(8, 3, 'TAB:Reset(500mg)', '1', '1', '1', 'After Meal', 7),
(9, 3, 'TAB:Afun(10)', '0', '0', '1', 'After Meal', 7),
(10, 3, 'TAB:Ace(500mg)', '1', '0', '1', 'After Meal', 10),
(11, 4, 'Alacot DS Eye Drops', '2', '2', '2', NULL, 30),
(12, 4, 'Cap:Dobesil(500)', '0', '1', '0', 'After Meal', 15),
(13, 1, 'Methsolon 16', '0', '0', '1', 'After Meal', 10);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `doctorid` int(11) NOT NULL,
  `patientname` varchar(200) NOT NULL,
  `patientcontactno` varchar(11) NOT NULL,
  `patientage` float NOT NULL,
  `patientgender` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctorid`, `patientname`, `patientcontactno`, `patientage`, `patientgender`, `date`) VALUES
(1, 1, 'Showaibul Haque Chowdhury', '01533103271', 18, 'Male', '2020-04-25'),
(3, 1, 'abc', '01533103272', 21, 'Male', '2020-04-25'),
(4, 1, 'Showaibul Haque Chowdhury', '01533103271', 18, 'Male', '2020-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitems`
--

CREATE TABLE `purchaseitems` (
  `id` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `mid` varchar(2000) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseitems`
--

INSERT INTO `purchaseitems` (`id`, `purchaseid`, `mid`, `quantity`, `total`) VALUES
(1, 1, '19', 10, 35),
(2, 1, '22', 10, 30),
(3, 1, '19', 10, 35),
(4, 1, '23', 10, 25),
(5, 1, '19', 10, 35),
(6, 1, '21', 10, 10),
(7, 1, '36', 5, 2150),
(8, 2, '19', 10, 35),
(9, 2, '22', 10, 30),
(10, 2, '19', 10, 35),
(11, 2, '23', 10, 25),
(12, 2, '19', 10, 35),
(13, 2, '21', 10, 10),
(14, 2, '33', 10, 220),
(15, 2, '32', 10, 120),
(16, 2, '24', 10, 100),
(17, 2, '25', 1, 270),
(18, 2, '26', 2, 280),
(19, 3, '29', 5, 1600),
(20, 3, '30', 5, 1650),
(21, 3, '20', 20, 20),
(22, 4, '19', 10, 35),
(23, 4, '22', 10, 30),
(24, 4, '21', 10, 10),
(25, 4, '23', 10, 25),
(26, 5, '27', 10, 35),
(27, 5, '26', 1, 140),
(28, 6, '24', 10, 100),
(29, 6, '22', 2, 200);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `invoice` int(20) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `pharmacyid` int(11) NOT NULL,
  `total` float NOT NULL,
  `discount` float NOT NULL,
  `netammount` float NOT NULL,
  `cuscontactno` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `invoice`, `date`, `time`, `pharmacyid`, `total`, `discount`, `netammount`, `cuscontactno`) VALUES
(1, NULL, '2020-05-07', '13:55:51', 1, 2320, 0, 2320, '01533103271'),
(2, NULL, '2020-05-07', '14:00:49', 1, 1160, 50, 1110, '01533103272'),
(3, NULL, '2020-05-07', '14:10:53', 2, 3270, 0, 3270, '01533103271'),
(4, NULL, '2020-05-07', '21:02:04', 1, 100, 0, 100, '01533103272'),
(5, NULL, '2020-05-07', '22:36:00', 1, 175, 0, 175, '01533103241'),
(6, NULL, '2020-05-07', '22:43:27', 1, 300, 20, 280, '01533103271');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `description`) VALUES
(1, 'Liquid', 'HomeConditions and treatmentsMedicines informationTypes of medicines\r\nTypes of medicines\r\nMost medicines come in a variety of types or formats. Be aware, though, that some medicines (particularly rare or unusual ones) only come in one type. Also, some may be more effective in one type than another.\r\nPreparations\r\nIn the UK, medicines often come in some of the following preparations:\r\n\r\nLiquid\r\nThe active part of the medicine is combined with a liquid to make it easier to take or better absorbed. A liquid may also be called a ‘mixture’, ‘solution’ or ‘syrup’. Many common liquids are now available without any added colouring or sugar.'),
(2, 'Tablet', 'The active ingredient is combined with another substance and pressed into a round or oval solid shape. There are different types of tablet. Soluble or dispersible tablets can safely be dissolved in water. '),
(3, 'Capsules', 'The active part of the medicine is contained inside a plastic shell that dissolves slowly in the stomach. You can take some capsules apart and mix the contents with your child’s favourite food. Others need to be swallowed whole, so the medicine isn’t absorbed until the stomach acid breaks down the capsule shell.'),
(4, 'Suppositories', 'The active part of the medicine is combined with another substance and pressed into a ‘bullet shape’ so it can be inserted into the bottom. Suppositories mustn''t be swallowed.'),
(5, 'Drops', 'These are often used where the active part of the medicine works best if it reaches the affected area directly. They tend to be used for eye, earor nose.'),
(6, 'Inhalers', 'The active part of the medicine is released under pressure directly into the lungs. Young children may need to use a ‘spacer’ device to take the medicine properly. Inhalers can be difficult to use at first so your pharmacist will show you how to use them.'),
(7, 'Injections', 'There are different types of injection, in how and where they''re injected. Subcutaneous or SC injections are given just under the surface of the skin. Intramuscular or IM injections are given into a muscle. Intrathecal injections are given into the fluid around the spinal cord. Intravenous or IV injections are given into a vein. Some injections can be given at home but most are given at your doctor’s surgery or in hospital.'),
(8, 'Implants or patches', 'These medicines are absorbed through the skin, such as nicotine patches for help in giving up smoking, or contraceptive implants.'),
(9, 'Equipment', 'There are several basic types: Diagnostic equipment includes medical imaging machines, used to aid in diagnosis. ... Treatment equipment includes infusion pumps, medical lasers and LASIK surgical machines. Life support equipment is used to maintain a patient''s bodily function.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyinventories`
--
ALTER TABLE `companyinventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `companytax`
--
ALTER TABLE `companytax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generics`
--
ALTER TABLE `generics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `genericid` (`genericid`),
  ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `ordercarts`
--
ALTER TABLE `ordercarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oid` (`oid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pharmacyinventories`
--
ALTER TABLE `pharmacyinventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`mid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `pharmacytax`
--
ALTER TABLE `pharmacytax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `prescriptionitems`
--
ALTER TABLE `prescriptionitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptionid` (`prescriptionid`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctorid` (`doctorid`);

--
-- Indexes for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchaseid` (`purchaseid`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacyid` (`pharmacyid`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `companyinventories`
--
ALTER TABLE `companyinventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `companytax`
--
ALTER TABLE `companytax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `generics`
--
ALTER TABLE `generics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `ordercarts`
--
ALTER TABLE `ordercarts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pharmacyinventories`
--
ALTER TABLE `pharmacyinventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pharmacytax`
--
ALTER TABLE `pharmacytax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prescriptionitems`
--
ALTER TABLE `prescriptionitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `companytax`
--
ALTER TABLE `companytax`
  ADD CONSTRAINT `ctFK` FOREIGN KEY (`cid`) REFERENCES `companies` (`id`);

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `cmFK` FOREIGN KEY (`cid`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `mgFK` FOREIGN KEY (`genericid`) REFERENCES `generics` (`id`),
  ADD CONSTRAINT `mtFK` FOREIGN KEY (`typeid`) REFERENCES `types` (`id`);

--
-- Constraints for table `ordercarts`
--
ALTER TABLE `ordercarts`
  ADD CONSTRAINT `cartmFK` FOREIGN KEY (`mid`) REFERENCES `medicines` (`id`),
  ADD CONSTRAINT `cartoFK` FOREIGN KEY (`oid`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `coFK` FOREIGN KEY (`cid`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `poFK` FOREIGN KEY (`pid`) REFERENCES `pharmacies` (`Id`);

--
-- Constraints for table `pharmacytax`
--
ALTER TABLE `pharmacytax`
  ADD CONSTRAINT `ptFK` FOREIGN KEY (`pid`) REFERENCES `pharmacies` (`Id`);

--
-- Constraints for table `prescriptionitems`
--
ALTER TABLE `prescriptionitems`
  ADD CONSTRAINT `preitemsFK` FOREIGN KEY (`prescriptionid`) REFERENCES `prescriptions` (`id`);

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `presdocFK` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  ADD CONSTRAINT `piFK` FOREIGN KEY (`purchaseid`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `ppFK` FOREIGN KEY (`pharmacyid`) REFERENCES `pharmacies` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
