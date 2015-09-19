<?php

/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cake\Chronos\Test\DateTime;

use Cake\Chronos\Carbon;
use TestCase;

class AddTest extends TestCase
{

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddYearsPositive($class)
    {
        $this->assertSame(1976, $class::createFromDate(1975)->addYears(1)->year);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddYearsZero($class)
    {
        $this->assertSame(1975, $class::createFromDate(1975)->addYears(0)->year);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddYearsNegative($class)
    {
        $this->assertSame(1974, $class::createFromDate(1975)->addYears(-1)->year);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddYear($class)
    {
        $this->assertSame(1976, $class::createFromDate(1975)->addYear()->year);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthsPositive($class)
    {
        $this->assertSame(1, $class::createFromDate(1975, 12)->addMonths(1)->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthsZero($class)
    {
        $this->assertSame(12, $class::createFromDate(1975, 12)->addMonths(0)->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthsNegative($class)
    {
        $this->assertSame(11, $class::createFromDate(1975, 12, 1)->addMonths(-1)->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonth($class)
    {
        $this->assertSame(1, $class::createFromDate(1975, 12)->addMonth()->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthWithOverflow($class)
    {
        $this->assertSame(3, $class::createFromDate(2012, 1, 31)->addMonth()->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthsNoOverflowPositive($class)
    {
        $this->assertSame('2012-02-29', $class::createFromDate(2012, 1, 31)->addMonthNoOverflow()->toDateString());
        $this->assertSame('2012-03-31', $class::createFromDate(2012, 1, 31)->addMonthsNoOverflow(2)->toDateString());
        $this->assertSame('2012-03-29', $class::createFromDate(2012, 2, 29)->addMonthNoOverflow()->toDateString());
        $this->assertSame('2012-02-29', $class::createFromDate(2011, 12, 31)->addMonthsNoOverflow(2)->toDateString());
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthsNoOverflowZero($class)
    {
        $this->assertSame(12, $class::createFromDate(1975, 12)->addMonths(0)->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthsNoOverflowNegative($class)
    {
        $this->assertSame('2012-01-29', $class::createFromDate(2012, 2, 29)->addMonthsNoOverflow(-1)->toDateString());
        $this->assertSame('2012-01-31', $class::createFromDate(2012, 3, 31)->addMonthsNoOverflow(-2)->toDateString());
        $this->assertSame('2012-02-29', $class::createFromDate(2012, 3, 31)->addMonthsNoOverflow(-1)->toDateString());
        $this->assertSame('2011-12-31', $class::createFromDate(2012, 1, 31)->addMonthsNoOverflow(-1)->toDateString());
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddDaysPositive($class)
    {
        $this->assertSame(1, $class::createFromDate(1975, 5, 31)->addDays(1)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddDaysZero($class)
    {
        $this->assertSame(31, $class::createFromDate(1975, 5, 31)->addDays(0)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddDaysNegative($class)
    {
        $this->assertSame(30, $class::createFromDate(1975, 5, 31)->addDays(-1)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddDay($class)
    {
        $this->assertSame(1, $class::createFromDate(1975, 5, 31)->addDay()->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddWeekdaysPositive($class)
    {
        $this->assertSame(17, $class::createFromDate(2012, 1, 4)->addWeekdays(9)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddWeekdaysZero($class)
    {
        $this->assertSame(4, $class::createFromDate(2012, 1, 4)->addWeekdays(0)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddWeekdaysNegative($class)
    {
        $this->assertSame(18, $class::createFromDate(2012, 1, 31)->addWeekdays(-9)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddWeekday($class)
    {
        $this->assertSame(9, $class::createFromDate(2012, 1, 6)->addWeekday()->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddWeeksPositive($class)
    {
        $this->assertSame(28, $class::createFromDate(1975, 5, 21)->addWeeks(1)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddWeeksZero($class)
    {
        $this->assertSame(21, $class::createFromDate(1975, 5, 21)->addWeeks(0)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddWeeksNegative($class)
    {
        $this->assertSame(14, $class::createFromDate(1975, 5, 21)->addWeeks(-1)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddWeek($class)
    {
        $this->assertSame(28, $class::createFromDate(1975, 5, 21)->addWeek()->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddHoursPositive($class)
    {
        $this->assertSame(1, $class::createFromTime(0)->addHours(1)->hour);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddHoursZero($class)
    {
        $this->assertSame(0, $class::createFromTime(0)->addHours(0)->hour);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddHoursNegative($class)
    {
        $this->assertSame(23, $class::createFromTime(0)->addHours(-1)->hour);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddHour($class)
    {
        $this->assertSame(1, $class::createFromTime(0)->addHour()->hour);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMinutesPositive($class)
    {
        $this->assertSame(1, $class::createFromTime(0, 0)->addMinutes(1)->minute);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMinutesZero($class)
    {
        $this->assertSame(0, $class::createFromTime(0, 0)->addMinutes(0)->minute);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMinutesNegative($class)
    {
        $this->assertSame(59, $class::createFromTime(0, 0)->addMinutes(-1)->minute);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMinute($class)
    {
        $this->assertSame(1, $class::createFromTime(0, 0)->addMinute()->minute);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddSecondsPositive($class)
    {
        $this->assertSame(1, $class::createFromTime(0, 0, 0)->addSeconds(1)->second);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddSecondsZero($class)
    {
        $this->assertSame(0, $class::createFromTime(0, 0, 0)->addSeconds(0)->second);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddSecondsNegative($class)
    {
        $this->assertSame(59, $class::createFromTime(0, 0, 0)->addSeconds(-1)->second);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddSecond($class)
    {
        $this->assertSame(1, $class::createFromTime(0, 0, 0)->addSecond()->second);
    }

    /***** Test non plural methods with non default args *****/

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddYearPassingArg($class)
    {
        $this->assertSame(1977, $class::createFromDate(1975)->addYear(2)->year);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthPassingArg($class)
    {
        $this->assertSame(7, $class::createFromDate(1975, 5, 1)->addMonth(2)->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMonthNoOverflowPassingArg($class)
    {
        $dt = $class::createFromDate(2010, 12, 31)->addMonthNoOverflow(2);
        $this->assertSame(2011, $dt->year);
        $this->assertSame(2, $dt->month);
        $this->assertSame(28, $dt->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddDayPassingArg($class)
    {
        $this->assertSame(12, $class::createFromDate(1975, 5, 10)->addDay(2)->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddHourPassingArg($class)
    {
        $this->assertSame(2, $class::createFromTime(0)->addHour(2)->hour);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddMinutePassingArg($class)
    {
        $this->assertSame(2, $class::createFromTime(0)->addMinute(2)->minute);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testAddSecondPassingArg($class)
    {
        $this->assertSame(2, $class::createFromTime(0)->addSecond(2)->second);
    }
}