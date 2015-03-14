<?php

class Pi
{
    /**
     * Get the CPU and GPU temperature in celcius
     *
     * @return Object
     */
    public function getTemps()
    {
        $temps = new stdClass();

        $temps->cpu = exec('cat /sys/class/thermal/thermal_zone0/temp') / 1000;
        $temps->gpu = (float)exec('/opt/vc/bin/vcgencmd measure_temp|cut -c6-9');

        return $temps;
    }

    /**
     * Get the CPU usage as a percentage
     *
     * @return float
     */
    public function getCPUUsage()
    {
        return (float)exec('top -d 0.5 -b -n2 | grep "Cpu(s)"|tail -n 1 | awk \'{print $2 + $4}\'');
    }

    /**
     * Get the hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return exec('hostname');
    }

    /**
     * Get IP address
     *
     * @return string
     */
    public function getIPAddress()
    {
        return exec('hostname -I');
    }

    /**
     * Get uptime in second
     *
     * @return string
     */
    public function getUptime()
    {
        return exec('cut -f1 -d. /proc/uptime');
    }
}
