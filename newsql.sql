CREATE TABLE IF NOT EXISTS `newstudents` (
  `Studentusn` varchar(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `RollNo` int(100) NOT NULL,
  `StudentSem` int(11) NOT NULL,
  `StudentDivision` varchar(100) NOT NULL,
  `StudentEmail` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `Faculty` (
  `FID` int(11) NOT NULL,
  `Faculty_Name` varchar(100) NOT NULL,
  `Sub_Handling` varchar(100) NOT NULL,
  `Sub_Code` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Designation` varchar(100) NOT NULL

) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;







CREATE TABLE IF NOT EXISTS `Subject` (
  `Subject_Name` varchar(100) NOT NULL,
  `Subject_Code` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `Result` (
  `Usn` varchar(11) NOT NULL,
  `Sub_Code` varchar(100) NOT NULL,
  `Test1` int(11) NOT NULL,
  `Test2` int(11) NOT NULL,
  `Test3` int(11) NOT NULL,
  `Avg1` int(11) NOT NULL,
  
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;