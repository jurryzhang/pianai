DROP TABLE IF EXISTS h5_card;
CREATE TABLE h5_card (
  `id` MEDIUMINT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cardName` VARCHAR(40) NOT NULL COMMENT '信用卡名字',
  `img` VARCHAR(200) NOT NULL COMMENT '图像地址',
  `createTime` INT(11) NOT NULL COMMENT '新增时间',
  `updateTime` INT(11) NOT NULL COMMENT '更新时间',
  `cardNumber` INT(19) NOT NULL COMMENT '信用卡号',
  `applyTime` INT(11) NOT NULL COMMENT '信用卡申请时间',
  `endTime` INT(11) NOT NULL COMMENT '信用卡到期时间',
  `username` VARCHAR (20) NOT NULL COMMENT '持卡人姓名',
  `note` VARCHAR (400) NOT NULL COMMENT '备注',
  `bank` VARCHAR (200) NOT NULL COMMENT '发卡银行',
  `cardType` TINYINT(2) NOT NULL COMMENT '信用卡分为贷记卡:1 和 准贷记卡:2',
  `account` INT(8) NOT NULL COMMENT '信用额度',
  `accountMoney` INT(8) NOT NULL COMMENT '提现额度',
  `payTime` INT(2) NOT NULL COMMENT '每月还款日,1号到31号',
  `interestPreDay` FLOAT NOT NULL COMMENT '日息',
  `isHome` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '是否首页,只有三个是首页的',
  PRIMARY KEY (`id`)
);
