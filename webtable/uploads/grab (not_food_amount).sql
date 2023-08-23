-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 06:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grab`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_ID` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `food_picture` varchar(255) NOT NULL,
  `food_ID` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_detail` varchar(255) NOT NULL,
  `food_amount` int(255) NOT NULL,
  `food_price` float NOT NULL,
  `food_total` int(11) NOT NULL,
  `res_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `autocart` BEFORE INSERT ON `cart` FOR EACH ROW BEGIN
INSERT INTO id_value_cart VALUES (NULL);
SET NEW.cart_ID = CONCAT("cart_",LPAD(LAST_INSERT_ID(),4,"0"));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cus`
--

CREATE TABLE `cus` (
  `cus_email` varchar(255) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `cus_surname` varchar(20) NOT NULL,
  `cus_birthdate` date NOT NULL,
  `cus_tel` varchar(10) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `cus_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cus`
--

INSERT INTO `cus` (`cus_email`, `cus_name`, `cus_surname`, `cus_birthdate`, `cus_tel`, `cus_address`, `cus_password`) VALUES
('admin@gmail.com', 'Grab', 'Food', '2023-02-17', '66444223', 'asdgggggggggggggg', 'admin'),
('AJ@gmail.com', 'grab', 'มั่งมี', '2023-03-08', '23213', '371/115', '44'),
('cusss@gmail.com', 'วรวิบูล', 'มั่งมี', '2023-03-16', '1235', '371/115', '444'),
('Ohmmy569@gmail.com', 'วรวิบูล', 'มั่งมี', '2023-03-11', '2222', '371/115', '123'),
('purmme8@gmail.com', 'นพดล', 'พรมเทศ', '2023-03-03', '09706262', '101/662 หมู่12 ต.นาป่า จ.ชลบุรี', '1234'),
('s6504062610234@kmutnb.ac.t', 'grab', 'มั่งมี', '2023-03-01', '1234', '371/115', '5555'),
('test2@email.com', 'test2', 'test2', '2003-11-22', '0970626215', '', 'Noppadol1111');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_picture` varchar(255) NOT NULL,
  `food_ID` varchar(255) NOT NULL,
  `food_name` text NOT NULL,
  `food_detail` text NOT NULL,
  `food_price` float NOT NULL,
  `type_ID` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_picture`, `food_ID`, `food_name`, `food_detail`, `food_price`, `type_ID`, `res_email`) VALUES
('lovepik-braised-beef-noodle-png-image_401029803_wh1200.png', 'food_0013', 'ก๋วยเตี๋ยวเนื้อตุ๋น', 'ก๋วยเตี๋ยวเนื้อตุ๋น วัวหลังบ้าน', 50, 'type_0009', 'noodles-gg@gmail.com'),
('shrimp-dumpling-16.jpeg', 'food_0026', 'ขนมจีบ เจ๊วิว ชุด 24 ลูก', 'ขนมจีบ Home made หมูล้วน หมูแน่นๆ ลูกใหญ่มาก รับประกันความอร่อย', 229, 'type_0009', 'timsum@gmai.com'),
('shrimp-dumpling-16.jpeg', 'food_0027', 'ขนมจีบ เจ๊วิว ชุด 20 ลูก', 'ขนมจีบ Home made หมูล้วน หมูแน่นๆ ลูกใหญ่มาก รับประกันความอร่อย', 199, 'type_0009', 'timsum@gmai.com'),
('shrimp-dumpling-16.jpeg', 'food_0028', 'ขนมจีบ เจ๊วิว ชุด 12 ลูก', 'ขนมจีบ Home made หมูล้วน หมูแน่นๆ ลูกใหญ่มาก รับประกันความอร่อย', 129, 'type_0009', 'timsum@gmai.com'),
('shrimp-dumpling-16.jpeg', 'food_0029', 'ขนมจีบ เจ๊วิว ชุด 10 ลูก', 'ขนมจีบ Home made หมูล้วน หมูแน่นๆ ลูกใหญ่มาก รับประกันความอร่อย', 109, 'type_0009', 'timsum@gmai.com'),
('9bff76f4d38d490da62b7fca4f5a4f5f_1608108375652703913.jpeg', 'food_0030', 'ทอดมันกุ้ง เจ๊วิว', 'ทอดมันกุ้ง Home made กุ้งล้วน กุ้งแน่นๆ ชิ้นใหญ่มาก รับประกันความอร่อย', 90, 'type_0009', 'timsum@gmai.com'),
('menueditor_item_40144da9e8f94b8a92aff84401a6f87b_1673894452575852589.jpg', 'food_0031', 'ซาลาเปา ไส้หมูแดง 1 ลูก', 'ซาลาเปาสูตรแต้จิ๋วร้อนๆ แป้งนุ่ม หอม อร่อย', 22, 'type_0009', 'timsum@gmai.com'),
('menueditor_item_40144da9e8f94b8a92aff84401a6f87b_1673894452575852589.jpg', 'food_0032', 'ซาลาเปา ไส้ครีม 1 ลูก', 'ซาลาเปาสูตรแต้จิ๋วร้อนๆ แป้งนุ่ม หอม อร่อย', 22, 'type_0010', 'timsum@gmai.com'),
('menueditor_item_216efb9aa362413da9c045b192e3cc88_1675269864432644386.jpg', 'food_0033', 'ไก่แช่เหล้า', 'ไก่แช่เหล้า', 420, 'type_0009', 'timsum@gmai.com'),
('723a4505835c45f2acdd4a540bad7415_1608108392989265090.jpeg', 'food_0034', 'ปอเปี๊ยะทอดไส้เป็ดย่าง', 'Spring Roll with Roasted Duck', 150, 'type_0009', 'timsum@gmai.com'),
('bf75be770b8445509992675d90398bd8_1608108435739191247.jpeg', 'food_0035', 'เกี๊ยวทอดไส้หมูและกุ้ยช่าย', 'Pan Fried Pork Dumplings with Chives', 120, 'type_0009', 'timsum@gmai.com'),
('popcon.jpeg', 'food_0036', 'POPCORN TO GO ZIP LOCK 85 Oz.', 'POPCORN TO GO ZIP LOCK 85 Oz.', 180, 'type_0010', 'majer@gmail.com'),
('46613fbbf5bc4e388a3451cb77e96edd_1675529003527492661.jpg', 'food_0037', 'POPCORN TO GO ZIP LOCK 85 Oz. PACK 2', 'POPCORN TO GO ZIP LOCK 85 Oz. PACK 2', 200, 'type_0010', 'majer@gmail.com'),
('6ed240c81532493688ea411620f5db76_1678291769543798373.jpg', 'food_0038', 'Bug Bunny Bucket Set', '1 Buy Bunny Bucket with Popcorn Ziplock 85oz. 1 IML Cup with Softdrink 44oz. Get Free Ricola Herb Sugar Free 17.5 g.', 590, 'type_0008', 'majer@gmail.com'),
('0033b861ddeb491f80a1a0c88026c962_1675962020121792923.jpg', 'food_0039', 'Ant-Man Bucket Set', 'แอนท์ แมน บัคเก็ต พร้อมป๊อปคอร์น ซิปล็อค ขนาด 85 ออนซ์ 1 ถุง แก้วน้ำลาย แอนท์ แมน พร้อมน้ำอัดลม ขนาด 32 ออนซ์ 1 แก้ว (มี 2 ลายให้เลือกสะสม) * สาขาที่จำหน่ายเครื่องดื่มเป๊ปซี่ รับฟรี...น้ำอัดลมขนาด 44 ออนซ์ 1 แก้ว', 420, 'type_0008', 'majer@gmail.com'),
('fed810b8798d428fb458822fb59af13c_1678123358994457734.jpg', 'food_0040', 'Scream Topper Cup Set (Mix Charater)', 'Scream Topper with IML Cup with Softdrink 44oz. 2 Cup Popcorn Ziplock 85oz. 2 Picecs', 390, 'type_0008', 'majer@gmail.com'),
('7f2354d50b374dc084f7ed19d2f37824_1678123363320548208.jpg', 'food_0041', 'Scream Bucket Set', 'Scream Bucket with Popcorn Ziplock 85oz. 1 Piece IML Cup with Softdrink 44oz.', 450, 'type_0008', 'majer@gmail.com'),
('5ed5f073bc6d467eb0fce8139014e159_1678123366916124266.jpg', 'food_0042', 'Shazam Movie Set', 'Shazam Tin Tub with popcorn Ziplock 85oz. IML Cup with Softdrink 44oz.', 350, 'type_0008', 'majer@gmail.com'),
('fe84ef716c2540db93ba73f66e642b1d_1675011697800453529.jpg', 'food_0043', 'ป๊อปปี้ สตอรว์เบอร์รี บัตเตอร์ คอร์น เฟรปเป้', 'นมปั่นกลิ่นบัตเตอร์คอร์น ผสมความเปรี้ยวอมหวานจากสตรอว์เบอร์รี สควอช เคี้ยวเพลินกับป๊อปคอร์นคาราเมล', 75, 'type_0008', 'chayen@gmail.com'),
('f8621e6af23340bbb881fa084a3c3aa9_1616484829809617187.jpeg', 'food_0044', 'อเมริกาโน่เย็น : พรีเมี่ยม', 'Iced Americano : Premium', 70, 'type_0008', 'chayen@gmail.com'),
('a3fdef209d404bb490271aeba4ee0933_1616484893742942615.jpeg', 'food_0045', 'คาปูชิโน่เย็น : พรีเมี่ยม', 'Iced Cappuccino : Premium', 80, 'type_0008', 'chayen@gmail.com'),
('51075530fd5649e58c35b7c4a236c2ae_1616484926680330267.jpeg', 'food_0046', 'คาราเมลมัคคิอาโต้เย็น : พรีเมี่ยม', 'Iced Caramel Macchiato : Premium “การแยกชั้นของเครื่องดื่มอาจมีการเปลี่ยนแปลงจากภาพถ่ายเนื่องด้วยข้อจำกัดของการจัดส่ง\"', 85, 'type_0008', 'chayen@gmail.com'),
('f6fec52eb8d0490e9d8a87ce652eb25d_1616484959779885262.jpeg', 'food_0047', 'คาราเมลมัคคิอาโต้เฟรปเป้ : พรีเมี่ยม', 'Caramel Macchiato Frappe : Premium', 90, 'type_0008', 'chayen@gmail.com'),
('033f26f31e114bd29a8b2d6f32b10c8c_1620285692456255092.jpg', 'food_0048', 'นมสด ปั่น', 'Fresh Milk Frappe', 55, 'type_0008', 'chayen@gmail.com'),
('a1620761_9992226.jpg', 'food_0049', 'พิซซ่า แฮมและปูอัด Ham&Crab Sticks Pizza', 'สัปปะรด แฮม ปูอัด มอสซาเรลล่าชีส ซอสเทาซันไอส์แลนด์', 369, 'type_0009', 'pizza@gmail.com'),
('b5b963a7_99922283.jpg', 'food_0050', 'พิซซ่า ซุปเปอร์เดอลุกซ์ Pizza Super Deluxe', 'แฮม เบคอน เป๊ปเปอโรนี ไส้กรอกรมควัน ไส้กรอกอิตาเลี่ยน เห็ด สับปะรด หอมใหญ่ พริกหวาน พิซซ่าซอส', 419, 'type_0009', 'pizza@gmail.com'),
('0606c9cd_9992216.jpg', 'food_0051', 'พิซซ่า ดับเบิ้ลชีส Double Cheese Pizza', 'มอสซาเรลล่าชีส ชีส ซอสพิซซ่า', 369, 'type_0009', 'pizza@gmail.com'),
('fe21e5b1_9992733.jpg', 'food_0052', 'พิซซ่า ไก่ย่างสไปซี่ Spicy Grilled Chicken', 'ไก่อบซอส สับปะรด พริกแดงพริกเขียว ซอสเทาซันไอส์แลนด์', 369, 'type_0009', 'pizza@gmail.com'),
('3d9d17ad_9992723.jpg', 'food_0053', 'พิซซ่า หมูรวมฮิต Mighty Meat Pizza', 'แฮม ไส้กรอกรมควัน เป๊ปเปอโรนี เห็ด สับปะรด ซอสพิซซ่า', 369, 'type_0009', 'pizza@gmail.com'),
('5a33250c_115811.jpg', 'food_0054', 'มักกะโรนีเบคอนอบชีส', ' Baked Macaroni & Cheese with Bacon', 169, 'type_0009', 'pizza@gmail.com'),
('445f89aa_115809.jpg', 'food_0055', 'มักกะโรนีแฮมและเห็ดอบชีส ', 'Baked Macaroni & Cheese with Ham & Mushroom', 169, 'type_0009', 'pizza@gmail.com'),
('0c9ae2e5_115810.jpg', 'food_0056', 'มักกะโรนีไก่บาร์บีคิวอบชีส', ' Baked Macaroni & Cheese with BBQ Chicken', 169, 'type_0009', 'pizza@gmail.com'),
('f82c1f01_116867111.jpg', 'food_0057', 'ไก่ทอดเนื้อล้วน สไตล์เกาหลี Korean Chicken Tender', 'ไก่ทอดเนื้อล้วน สไตล์เกาหลี 6 ชิ้น', 129, 'type_0009', 'pizza@gmail.com'),
('coke.jpg', 'food_0058', ' โค้ก 1.25 ลิตร Coke 1.25 Ltr.', 'โค้ก 1.25 ลิตร Coke 1.25 Ltr.', 38, 'type_0008', 'pizza@gmail.com'),
('df922387_1250281.jpg', 'food_0059', 'Hong Kong Egg Tart', 'ต่านทาร์ต', 49, 'type_0010', 'pizza@gmail.com'),
('44be9d35_TPO2679m.jpg', 'food_0060', 'ชุดชีสซี่ดังก์แฟมมิลิ เซ็ท (ไก่)', 'ชีสซี่เบอร์เกอร์ไก่ 2 ชิ้น, ชีสดังก์ 1 ถ้วย, เบคอน บิสก์ 1 ถ้วย,นักเก็ต 4 ชิ้น, เฟรนช์ฟรายส์ใหญ่ 1 กล่อง, พายข้าวโพด 1 ชิ้น', 399, 'type_0009', 'macdodo@gmail.com'),
('b9f3abc1_TPO1048m.jpg', 'food_0061', 'ชุดชีสซี่เบอร์เกอร์เนื้อ+ชีสดังก์+เบคอน บิสก์ (ใหญ่พิเศษ)', 'ชีสซี่เบอร์เกอร์เนื้อ 1 ชิ้น, ชีสดังก์ 1 ถ้วย, เบคอน บิสก์ 1 ถ้วย, เฟรนช์ฟรายส์ขนาดใหญ่พิเศษ 1 กล่อง, โค้ก (32 ออนซ์) 1 แก้ว', 244, 'type_0009', 'macdodo@gmail.com'),
('35679603_TPO1067m.jpg', 'food_0062', 'ชุดชีสซี่เบอร์เกอร์คอมโบ (ไก่)', 'ชีสซี่เบอร์เกอร์ไก่ 2 ชิ้น, ชีสดังก์ 1 ถ้วย, เบคอน บิสก์ 1 ถ้วย, เฟรนช์ฟรายส์กลาง 1 กล่อง, โค้ก (16 ออนซ์) 2 แก้ว', 319, 'type_0009', 'macdodo@gmail.com'),
('42332cee_TPO1722m.jpg', 'food_0063', '[อร่อยซ่ากับโค้ก] 44% ชุดชีสเบอร์เกอร์ดูโอ้', 'ชีสเบอร์เกอร์ 2 ชิ้น, เฟรนช์ฟรายส์ (M) 2 กล่อง, โค้ก (16 ออนซ์) 2 แก้ว 2 Cheeseburger, 2 French Fries (M), 2 Coke (16 oz.)', 239, 'type_0009', 'macdodo@gmail.com'),
('b880905f_TPO7089_1m.jpg', 'food_0064', ' โค้กซีโร่ (ขนาด 32 ออนซ์)', 'ขนาด 32 ออนซ์', 72, 'type_0008', 'macdodo@gmail.com'),
('fa355c25_TPO7362_2m.jpg', 'food_0065', 'ชาเย็น (ขนาด 32 ออนซ์)', 'ขนาด 32 ออนซ์', 65, 'type_0010', 'macdodo@gmail.com'),
('menueditor_item_3a59b84e1c5d49638c10f1b6122c927d_1655638668092327847.jpg', 'food_0066', 'ข้าวราดกะเพรารวมมิตร + หมูกระเทียม', '', 110, 'type_0009', 'kmutnbFOOD@gmail.com'),
('menueditor_item_a978f8bc41674bbcb4d0ff69d2f92692_1654648375867415567.jpg', 'food_0067', 'ข้าวราดกะเพราหมูกรอบ + หมูกระเทียม', '', 100, 'type_0009', 'kmutnbFOOD@gmail.com'),
('menueditor_item_5d6852372d6a425abd88c5a1dc6b7229_1654648354777332537.jpg', 'food_0068', 'ข้าวราดกะเพราหมูสับ + หมูกระเทียม', '', 100, 'type_0009', 'kmutnbFOOD@gmail.com'),
('menueditor_item_c137504d8a474008ad9c8891d2bdbdf8_1656229784141148824.jpg', 'food_0069', 'น้ำกระเจี๊ยบ', '', 15, 'type_0008', 'kmutnbFOOD@gmail.com'),
('menueditor_item_d804f14aa7a44b769b83ff19db27a5de_1656229800291485205.jpg', 'food_0070', 'น้ำเก๊กฮวย', '', 15, 'type_0008', 'kmutnbFOOD@gmail.com'),
('menueditor_item_629880c8701b46cdbc2a817a716aa599_1676792648836387321.jpg', 'food_0071', 'น้ำเก๊กฮวย (ขวดใหญ่)', '', 25, 'type_0008', 'kmutnbFOOD@gmail.com');

--
-- Triggers `food`
--
DELIMITER $$
CREATE TRIGGER `auto` BEFORE INSERT ON `food` FOR EACH ROW BEGIN
INSERT INTO id_value_food VALUES (NULL);
SET NEW.food_ID = CONCAT("food_",LPAD(LAST_INSERT_ID(),4,"0"));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `order_ID` varchar(255) NOT NULL,
  `order_product` varchar(255) NOT NULL,
  `order_price` float NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL,
  `pay_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`order_ID`, `order_product`, `order_price`, `order_status`, `order_date`, `cus_email`, `res_email`, `pay_type`) VALUES
('order_0035', 'ชาเขียว x1 , ', 2323, 'กำลังจัดส่ง', '2023-03-14', 'ohmmy569@gmail.com', 'macdodo@gmail.com', 'ชำระเงินปลายทาง'),
('order_0037', 'เหนียวมะม่วง x99 , ', 9851, 'เสร็จสิ้น', '2023-03-14', 'ohmmy569@gmail.com', 'macdodo@gmail.com', 'ชำระเงินปลายทาง'),
('order_0038', 'เหนียวมะม่วง x121 , ', 12040, 'เสร็จสิ้น', '2023-03-14', 'ohmmy569@gmail.com', 'macdodo@gmail.com', 'ชำระเงินปลายทาง'),
('order_0039', 'เหนียวมะม่วง x1 , ', 100, 'เสร็จสิ้น', '2023-03-14', 'ohmmy569@gmail.com', 'macdodo@gmail.com', 'ชำระเงินปลายทาง'),
('order_0040', 'Hamburgur x3 , ', 410, 'เสร็จสิ้น', '2023-03-14', 'ohmmy569@gmail.com', 'macdodo@gmail.com', 'ชำระเงินปลายทาง'),
('order_0041', 'POPCORN TO GO ZIP LOCK 85 Oz. x1 , Scream Topper Cup Set (Mix Charater) x1 , ', 570, 'เสร็จสิ้น', '2023-03-14', 'purmme8@gmail.com', 'majer@gmail.com', 'ชำระด้วยบัตรเครดิต');

--
-- Triggers `food_order`
--
DELIMITER $$
CREATE TRIGGER `autoert` BEFORE INSERT ON `food_order` FOR EACH ROW BEGIN
INSERT INTO id_value_order VALUES (NULL);
SET NEW.order_ID = CONCAT("order_",LPAD(LAST_INSERT_ID(),4,"0"));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `type_ID` varchar(255) NOT NULL,
  `type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`type_ID`, `type_name`) VALUES
('type_0001', 'all'),
('type_0008', 'เครื่องดื่ม'),
('type_0009', 'อาหาร'),
('type_0010', 'ของหวาน');

--
-- Triggers `food_type`
--
DELIMITER $$
CREATE TRIGGER `autoo` BEFORE INSERT ON `food_type` FOR EACH ROW BEGIN
INSERT INTO id_value_type VALUES (NULL);
SET NEW.type_ID = CONCAT("type_",LPAD(LAST_INSERT_ID(),4,"0"));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `id_value_cart`
--

CREATE TABLE `id_value_cart` (
  `ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_value_cart`
--

INSERT INTO `id_value_cart` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145),
(146),
(147),
(148),
(149),
(150),
(151),
(152),
(153),
(154),
(155),
(156),
(157),
(158),
(159),
(160),
(161),
(162),
(163),
(164),
(165),
(166),
(167),
(168),
(169),
(170),
(171),
(172),
(173),
(174),
(175),
(176),
(177),
(178),
(179),
(180),
(181),
(182),
(183),
(184),
(185),
(186),
(187),
(188),
(189),
(190),
(191),
(192),
(193),
(194),
(195),
(196),
(197),
(198),
(199),
(200),
(201),
(202),
(203),
(204),
(205),
(206),
(207),
(208),
(209),
(210),
(211),
(212),
(213),
(214),
(215),
(216),
(217),
(218),
(219),
(220),
(221),
(222),
(223),
(224),
(225),
(226),
(227),
(228),
(229),
(230),
(231),
(232),
(233),
(234),
(235),
(236),
(237),
(238),
(239);

-- --------------------------------------------------------

--
-- Table structure for table `id_value_food`
--

CREATE TABLE `id_value_food` (
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_value_food`
--

INSERT INTO `id_value_food` (`id`) VALUES
(0),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71);

-- --------------------------------------------------------

--
-- Table structure for table `id_value_order`
--

CREATE TABLE `id_value_order` (
  `ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_value_order`
--

INSERT INTO `id_value_order` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41);

-- --------------------------------------------------------

--
-- Table structure for table `id_value_type`
--

CREATE TABLE `id_value_type` (
  `ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_value_type`
--

INSERT INTO `id_value_type` (`ID`) VALUES
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `res_picture` varchar(255) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL,
  `res_password` varchar(255) NOT NULL,
  `res_open_status` text NOT NULL,
  `res_tel` varchar(255) NOT NULL,
  `res_detail` text NOT NULL,
  `res_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`res_picture`, `res_name`, `res_email`, `res_password`, `res_open_status`, `res_tel`, `res_detail`, `res_address`) VALUES
('logo-5.png', 'Chayen  (ชาเย็นเย็นชา)', 'chayen@gmail.com', '123', 'Open', '0987869965', 'Chayen  (ชาเย็นเย็นชา)', 'CPAC ฝั่งริเวอร์ไซด์'),
('logo-3.png', 'Kmutnb Food', 'kmutnbFOOD@gmail.com', '123', 'Open', '0989990756', 'ร้านอาหารตามสั่ง', 'KMUTNB'),
('logo-1.png', 'Mcdodo\'s', 'macdodo@gmail.com', '1234', 'Open', '0917573685', 'Mcdodo\'s', 'สุพรีม คอมเพล็กซ์'),
('majer.png', 'Popcorn Major Cineplex', 'majer@gmail.com', '1234', 'Open', '0987876546', 'ป๊อปคอร์น เมเจอร์ ซีนีเพล็กซ์', 'เกตเวย์บางซื่อ'),
('food-3.png', 'Noodles', 'noodles-gg@gmail.com', '1234', 'Open', '0983434323', 'ร้านอาหารตามสั่ง', '371/115'),
('og-image-pizza.jpg', 'The Pizza Company', 'pizza@gmail.com', '1234', 'Open', '0970458641', 'The Pizza Company', 'ถนนประชาราษฎร์'),
('ร้านติ่มซัม.jpeg', 'ขนมจีบ ติ่มซัม By เจ๊วิว', 'timsum@gmai.com', '1234', 'Open', '0987364527', 'ขนมจีบ ติ่มซัม ลาดพร้าว', 'ลาดพร้าว');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_email` varchar(255) NOT NULL,
  `rider_name` text NOT NULL,
  `rider_surname` text NOT NULL,
  `rider_birthdate` date NOT NULL,
  `rider_tel` varchar(10) NOT NULL,
  `rider_password` varchar(255) NOT NULL,
  `rider_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_email`, `rider_name`, `rider_surname`, `rider_birthdate`, `rider_tel`, `rider_password`, `rider_salary`) VALUES
('chayen@gmail.com', 'ชาเย็นเย็นชา', 'hhh', '2023-03-08', '0222222', '213123', 0),
('ohmmy569@gmail.com', 'Worawiboon', 'Mungmee', '2023-03-07', '0917573685', 'asdas', 423234),
('rider1@gmail.com', 'Pong', 'Porn', '2023-03-14', '0987654321', 'pp', 200.24),
('s6504062610234@kmutnb.ac.th', 'test3', 'ttt', '2023-02-28', '0842355892', '555', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rider_order`
--

CREATE TABLE `rider_order` (
  `ID` int(255) NOT NULL,
  `order_ID` varchar(255) NOT NULL,
  `rider_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rider_order`
--

INSERT INTO `rider_order` (`ID`, `order_ID`, `rider_email`) VALUES
(11, 'order_0037', 'rider1@gmail.com'),
(12, 'order_0037', 'rider1@gmail.com'),
(13, 'order_0039', 'rider1@gmail.com'),
(14, 'order_0039', 'rider1@gmail.com'),
(15, 'order_0039', 'rider1@gmail.com'),
(16, 'order_0040', 'rider1@gmail.com'),
(17, 'order_0041', 'rider1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_ID`),
  ADD KEY `cus_ID` (`cus_email`),
  ADD KEY `food_ID` (`food_ID`),
  ADD KEY `food_price` (`food_price`),
  ADD KEY `cus_email` (`cus_email`),
  ADD KEY `res_email` (`res_email`);

--
-- Indexes for table `cus`
--
ALTER TABLE `cus`
  ADD PRIMARY KEY (`cus_email`),
  ADD UNIQUE KEY `cus_email` (`cus_email`),
  ADD UNIQUE KEY `cus_tel` (`cus_tel`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_ID`),
  ADD UNIQUE KEY `food_ID` (`food_ID`),
  ADD KEY `food_ibfk_1` (`res_email`),
  ADD KEY `food_ibfk_2` (`type_ID`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `cus_email` (`cus_email`),
  ADD KEY `hav` (`res_email`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`type_ID`),
  ADD UNIQUE KEY `type_ID` (`type_ID`);

--
-- Indexes for table `id_value_cart`
--
ALTER TABLE `id_value_cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `id_value_food`
--
ALTER TABLE `id_value_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_value_order`
--
ALTER TABLE `id_value_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `id_value_type`
--
ALTER TABLE `id_value_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`res_email`),
  ADD UNIQUE KEY `res_email` (`res_email`),
  ADD UNIQUE KEY `res_tel` (`res_tel`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_email`),
  ADD UNIQUE KEY `rider_email` (`rider_email`),
  ADD UNIQUE KEY `rider_tel` (`rider_tel`);

--
-- Indexes for table `rider_order`
--
ALTER TABLE `rider_order`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `id_value_cart`
--
ALTER TABLE `id_value_cart`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `id_value_food`
--
ALTER TABLE `id_value_food`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `id_value_order`
--
ALTER TABLE `id_value_order`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `id_value_type`
--
ALTER TABLE `id_value_type`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rider_order`
--
ALTER TABLE `rider_order`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cus_email`) REFERENCES `cus` (`cus_email`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`food_ID`) REFERENCES `food` (`food_ID`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`res_email`) REFERENCES `restaurant` (`res_email`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `define` FOREIGN KEY (`type_ID`) REFERENCES `food_type` (`type_ID`),
  ADD CONSTRAINT `have` FOREIGN KEY (`res_email`) REFERENCES `restaurant` (`res_email`);

--
-- Constraints for table `food_order`
--
ALTER TABLE `food_order`
  ADD CONSTRAINT `food_order_ibfk_3` FOREIGN KEY (`cus_email`) REFERENCES `cus` (`cus_email`),
  ADD CONSTRAINT `hav` FOREIGN KEY (`res_email`) REFERENCES `restaurant` (`res_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
