<?php

use yii\db\Schema;
use yii\db\Migration;

class m150113_232323_payment_notify extends Migration{

	public function up(){
		$tableOptions = 'engine=innodb character set utf8';
		if($this->db->driverName === 'mysql') {
			$tableOptions .= ' collate utf8_unicode_ci';
		}

		$this->createTable('{{%payment_notify}}', [
			'mode' => Schema::TYPE_STRING . '(50) not null comment "第三方支付类型"',
			'tid' => Schema::TYPE_BIGINT . ' not null comment "第三方支付端流水号"',
			'pid' => Schema::TYPE_BIGINT . ' not null comment "支付记录id"',
			'status' => Schema::TYPE_BOOLEAN . ' not null default 0 comment "支付结果状态"',
			'data' => Schema::TYPE_TEXT . ' not null comment "消息通知数据(json)"',
			'created_at' => Schema::TYPE_INTEGER . ' not null comment "接收时间"',
		], $tableOptions . ' comment="第三方支付消息通知记录"');
	}

	public function down(){
		$this->dropTable('{{%payment_notify}}');
	}

}