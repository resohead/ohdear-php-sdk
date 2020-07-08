<?php

namespace OhDear\PhpSdk\Tests;

use OhDear\PhpSdk\Resources\CronCheck;

class CronCheckTest extends TestCase
{
    /** @test */
    public function it_can_create_and_list_cron_check_definitions()
    {
        $siteId = 1;

        $cronCheck = $this->ohDear->createCronCheck(
            $siteId,
            'test',
            '* * * * *',
            2,
            'a test',
            'Europe/Brussels'
        );

        $this->assertInstanceOf(CronCheck::class, $cronCheck);

        $cronChecks = $this->ohDear->cronChecks(1);
        $this->assertCount(1, $cronChecks);

        $cronCheck->delete();
        $cronChecks = $this->ohDear->cronChecks(1);
        $this->assertCount(0, $cronChecks);
    }
}
