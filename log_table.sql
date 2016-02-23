CREATE TABLE `uLog` (
	`log_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`ip` VARCHAR(20) NULL DEFAULT NULL,
	`proxy` TEXT NULL,
	`host` TEXT NULL,
	`user_id` VARCHAR(255) NULL DEFAULT NULL,
	`user_agent` VARCHAR(300) NULL DEFAULT NULL,
	`controller_name` VARCHAR(50) NOT NULL,
	`method_name` VARCHAR(100) NOT NULL,
	`post_data` LONGTEXT NULL,
	`notified` TINYINT(4) NULL DEFAULT '0',
	`remark` VARCHAR(100) NULL DEFAULT NULL,
	`create_id` VARCHAR(20) NOT NULL,
	`create_dt` DATETIME NOT NULL,
	PRIMARY KEY (`log_id`),
	INDEX `notified` (`notified`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
ROW_FORMAT=COMPACT
AUTO_INCREMENT=1
;
