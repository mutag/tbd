<? PHP 

$sql = CREATE TABLE `users` (
  `userId` int(8) NOT NULL,
  `userName` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `displayName` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
//wb

--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
?>