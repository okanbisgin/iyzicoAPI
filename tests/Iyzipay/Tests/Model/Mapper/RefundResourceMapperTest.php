<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\RefundResourceMapper;
use Iyzipay\Model\RefundResource;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class RefundResourceMapperTest extends TestCase
{
    public function test_should_map_refund_resource()
    {
        $json = $this->retrieveJsonFile("refund.json");

        $refund = RefundResourceMapper::create($json)->jsonDecode()->mapRefundResource(new RefundResource());

        $this->assertNotEmpty($refund);
        $this->assertEquals(Status::FAILURE, $refund->getStatus());
        $this->assertEquals("10000", $refund->getErrorCode());
        $this->assertEquals("error message", $refund->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $refund->getErrorGroup());
        $this->assertEquals(Locale::TR, $refund->getLocale());
        $this->assertEquals("1458545234852", $refund->getSystemTime());
        $this->assertEquals("123456", $refund->getConversationId());
        $this->assertJson($refund->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $refund->getRawResult());
        $this->assertEquals("1", $refund->getPaymentId());
        $this->assertEquals("1", $refund->getPaymentTransactionId());
        $this->assertEquals("1", $refund->getPrice());
        $this->assertEquals("TRY", $refund->getCurrency());
        $this->assertEquals("connector name", $refund->getConnectorName());
        $this->assertEquals("1234567", $refund->getAuthCode());
    }
}