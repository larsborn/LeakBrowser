<?php declare(strict_types=1);

namespace App\Enum;

use Patchlevel\Enum\Enum;

/**
 * @psalm-immutable
 */
class ExifGPSInfo extends Enum
{
    private const GPS_VERSION_ID = 'GPSVersionID';
    private const GPS_LATITUDE_REF = 'GPSLatitudeRef';
    private const GPS_LATITUDE = 'GPSLatitude';
    private const GPS_LONGITUDE_REF = 'GPSLongitudeRef';
    private const GPS_LONGITUDE = 'GPSLongitude';
    private const GPS_ALTITUDE_REF = 'GPSAltitudeRef';
    private const GPS_ALTITUDE = 'GPSAltitude';
    private const GPS_TIME_STAMP = 'GPSTimeStamp';
    private const GPS_SATELLITES = 'GPSSatellites';
    private const GPS_STATUS = 'GPSStatus';
    private const GPS_MEASURE_MODE = 'GPSMeasureMode';
    private const GPSDOP = 'GPSDOP';
    private const GPS_SPEED_REF = 'GPSSpeedRef';
    private const GPS_SPEED = 'GPSSpeed';
    private const GPS_TRACK_REF = 'GPSTrackRef';
    private const GPS_TRACK = 'GPSTrack';
    private const GPS_IMG_DIRECTION_REF = 'GPSImgDirectionRef';
    private const GPS_IMG_DIRECTION = 'GPSImgDirection';
    private const GPS_MAP_DATUM = 'GPSMapDatum';
    private const GPS_DEST_LATITUDE_REF = 'GPSDestLatitudeRef';
    private const GPS_DEST_LATITUDE = 'GPSDestLatitude';
    private const GPS_DEST_LONGITUDE_REF = 'GPSDestLongitudeRef';
    private const GPS_DEST_LONGITUDE = 'GPSDestLongitude';
    private const GPS_DEST_BEARING_REF = 'GPSDestBearingRef';
    private const GPS_DEST_BEARING = 'GPSDestBearing';
    private const GPS_DEST_DISTANCE_REF = 'GPSDestDistanceRef';
    private const GPS_DEST_DISTANCE = 'GPSDestDistance';
    private const GPS_PROCESSING_METHOD = 'GPSProcessingMethod';
    private const GPS_AREA_INFORMATION = 'GPSAreaInformation';
    private const GPS_DATE_STAMP = 'GPSDateStamp';
    private const GPS_DIFFERENTIAL = 'GPSDifferential';
    private const GPSH_POSITIONING_ERROR = 'GPSHPositioningError';

    public static function GPSVersionID(): self
    {
        return self::get(self::GPS_VERSION_ID);
    }

    public static function GPSLatitudeRef(): self
    {
        return self::get(self::GPS_LATITUDE_REF);
    }

    public static function GPSLatitude(): self
    {
        return self::get(self::GPS_LATITUDE);
    }

    public static function GPSLongitudeRef(): self
    {
        return self::get(self::GPS_LONGITUDE_REF);
    }

    public static function GPSLongitude(): self
    {
        return self::get(self::GPS_LONGITUDE);
    }

    public static function GPSAltitudeRef(): self
    {
        return self::get(self::GPS_ALTITUDE_REF);
    }

    public static function GPSAltitude(): self
    {
        return self::get(self::GPS_ALTITUDE);
    }

    public static function GPSTimeStamp(): self
    {
        return self::get(self::GPS_TIME_STAMP);
    }

    public static function GPSSatellites(): self
    {
        return self::get(self::GPS_SATELLITES);
    }

    public static function GPSStatus(): self
    {
        return self::get(self::GPS_STATUS);
    }

    public static function GPSMeasureMode(): self
    {
        return self::get(self::GPS_MEASURE_MODE);
    }

    public static function GPSDOP(): self
    {
        return self::get(self::GPSDOP);
    }

    public static function GPSSpeedRef(): self
    {
        return self::get(self::GPS_SPEED_REF);
    }

    public static function GPSSpeed(): self
    {
        return self::get(self::GPS_SPEED);
    }

    public static function GPSTrackRef(): self
    {
        return self::get(self::GPS_TRACK_REF);
    }

    public static function GPSTrack(): self
    {
        return self::get(self::GPS_TRACK);
    }

    public static function GPSImgDirectionRef(): self
    {
        return self::get(self::GPS_IMG_DIRECTION_REF);
    }

    public static function GPSImgDirection(): self
    {
        return self::get(self::GPS_IMG_DIRECTION);
    }

    public static function GPSMapDatum(): self
    {
        return self::get(self::GPS_MAP_DATUM);
    }

    public static function GPSDestLatitudeRef(): self
    {
        return self::get(self::GPS_DEST_LATITUDE_REF);
    }

    public static function GPSDestLatitude(): self
    {
        return self::get(self::GPS_DEST_LATITUDE);
    }

    public static function GPSDestLongitudeRef(): self
    {
        return self::get(self::GPS_DEST_LONGITUDE_REF);
    }

    public static function GPSDestLongitude(): self
    {
        return self::get(self::GPS_DEST_LONGITUDE);
    }

    public static function GPSDestBearingRef(): self
    {
        return self::get(self::GPS_DEST_BEARING_REF);
    }

    public static function GPSDestBearing(): self
    {
        return self::get(self::GPS_DEST_BEARING);
    }

    public static function GPSDestDistanceRef(): self
    {
        return self::get(self::GPS_DEST_DISTANCE_REF);
    }

    public static function GPSDestDistance(): self
    {
        return self::get(self::GPS_DEST_DISTANCE);
    }

    public static function GPSProcessingMethod(): self
    {
        return self::get(self::GPS_PROCESSING_METHOD);
    }

    public static function GPSAreaInformation(): self
    {
        return self::get(self::GPS_AREA_INFORMATION);
    }

    public static function GPSDateStamp(): self
    {
        return self::get(self::GPS_DATE_STAMP);
    }

    public static function GPSDifferential(): self
    {
        return self::get(self::GPS_DIFFERENTIAL);
    }

    public static function GPSHPositioningError(): self
    {
        return self::get(self::GPSH_POSITIONING_ERROR);
    }

    public static function fromString(string $value): self
    {
        return self::get($value);
    }
}
