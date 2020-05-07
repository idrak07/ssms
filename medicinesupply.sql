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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
-- Constraints for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
