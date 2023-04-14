<?php declare(strict_types=1);

namespace App\Enum;

use Patchlevel\Enum\Enum;

/**
 * @psalm-immutable
 */
class ExifPhoto extends Enum
{
    private const EXPOSURE_TIME = 'ExposureTime';
    private const F_NUMBER = 'FNumber';
    private const EXPOSURE_PROGRAM = 'ExposureProgram';
    private const SPECTRAL_SENSITIVITY = 'SpectralSensitivity';
    private const ISO_SPEED_RATINGS = 'ISOSpeedRatings';
    private const OECF = 'OECF';
    private const SENSITIVITY_TYPE = 'SensitivityType';
    private const STANDARD_OUTPUT_SENSITIVITY = 'StandardOutputSensitivity';
    private const RECOMMENDED_EXPOSURE_INDEX = 'RecommendedExposureIndex';
    private const ISO_SPEED = 'ISOSpeed';
    private const ISO_SPEED_LATITUDEYYY = 'ISOSpeedLatitudeyyy';
    private const ISO_SPEED_LATITUDEZZZ = 'ISOSpeedLatitudezzz';
    private const EXIF_VERSION = 'ExifVersion';
    private const DATE_TIME_ORIGINAL = 'DateTimeOriginal';
    private const DATE_TIME_DIGITIZED = 'DateTimeDigitized';
    private const OFFSET_TIME = 'OffsetTime';
    private const OFFSET_TIME_ORIGINAL = 'OffsetTimeOriginal';
    private const OFFSET_TIME_DIGITIZED = 'OffsetTimeDigitized';
    private const COMPONENTS_CONFIGURATION = 'ComponentsConfiguration';
    private const COMPRESSED_BITS_PER_PIXEL = 'CompressedBitsPerPixel';
    private const SHUTTER_SPEED_VALUE = 'ShutterSpeedValue';
    private const APERTURE_VALUE = 'ApertureValue';
    private const BRIGHTNESS_VALUE = 'BrightnessValue';
    private const EXPOSURE_BIAS_VALUE = 'ExposureBiasValue';
    private const MAX_APERTURE_VALUE = 'MaxApertureValue';
    private const SUBJECT_DISTANCE = 'SubjectDistance';
    private const METERING_MODE = 'MeteringMode';
    private const LIGHT_SOURCE = 'LightSource';
    private const FLASH = 'Flash';
    private const FOCAL_LENGTH = 'FocalLength';
    private const SUBJECT_AREA = 'SubjectArea';
    private const MAKER_NOTE = 'MakerNote';
    private const USER_COMMENT = 'UserComment';
    private const SUB_SEC_TIME = 'SubSecTime';
    private const SUB_SEC_TIME_ORIGINAL = 'SubSecTimeOriginal';
    private const SUB_SEC_TIME_DIGITIZED = 'SubSecTimeDigitized';
    private const TEMPERATURE = 'Temperature';
    private const HUMIDITY = 'Humidity';
    private const PRESSURE = 'Pressure';
    private const WATER_DEPTH = 'WaterDepth';
    private const ACCELERATION = 'Acceleration';
    private const CAMERA_ELEVATION_ANGLE = 'CameraElevationAngle';
    private const FLASHPIX_VERSION = 'FlashpixVersion';
    private const COLOR_SPACE = 'ColorSpace';
    private const PIXEL_XDIMENSION = 'PixelXDimension';
    private const PIXEL_YDIMENSION = 'PixelYDimension';
    private const RELATED_SOUND_FILE = 'RelatedSoundFile';
    private const INTEROPERABILITY_TAG = 'InteroperabilityTag';
    private const FLASH_ENERGY = 'FlashEnergy';
    private const SPATIAL_FREQUENCY_RESPONSE = 'SpatialFrequencyResponse';
    private const FOCAL_PLANE_XRESOLUTION = 'FocalPlaneXResolution';
    private const FOCAL_PLANE_YRESOLUTION = 'FocalPlaneYResolution';
    private const FOCAL_PLANE_RESOLUTION_UNIT = 'FocalPlaneResolutionUnit';
    private const SUBJECT_LOCATION = 'SubjectLocation';
    private const EXPOSURE_INDEX = 'ExposureIndex';
    private const SENSING_METHOD = 'SensingMethod';
    private const FILE_SOURCE = 'FileSource';
    private const SCENE_TYPE = 'SceneType';
    private const CFA_PATTERN = 'CFAPattern';
    private const CUSTOM_RENDERED = 'CustomRendered';
    private const EXPOSURE_MODE = 'ExposureMode';
    private const WHITE_BALANCE = 'WhiteBalance';
    private const DIGITAL_ZOOM_RATIO = 'DigitalZoomRatio';
    private const FOCAL_LENGTH_IN_35_MM_FILM = 'FocalLengthIn35mmFilm';
    private const SCENE_CAPTURE_TYPE = 'SceneCaptureType';
    private const GAIN_CONTROL = 'GainControl';
    private const CONTRAST = 'Contrast';
    private const SATURATION = 'Saturation';
    private const SHARPNESS = 'Sharpness';
    private const DEVICE_SETTING_DESCRIPTION = 'DeviceSettingDescription';
    private const SUBJECT_DISTANCE_RANGE = 'SubjectDistanceRange';
    private const IMAGE_UNIQUE_ID = 'ImageUniqueID';
    private const CAMERA_OWNER_NAME = 'CameraOwnerName';
    private const BODY_SERIAL_NUMBER = 'BodySerialNumber';
    private const LENS_SPECIFICATION = 'LensSpecification';
    private const LENS_MAKE = 'LensMake';
    private const LENS_MODEL = 'LensModel';
    private const LENS_SERIAL_NUMBER = 'LensSerialNumber';
    private const COMPOSITE_IMAGE = 'CompositeImage';
    private const SOURCE_IMAGE_NUMBER_OF_COMPOSITE_IMAGE = 'SourceImageNumberOfCompositeImage';
    private const SOURCE_EXPOSURE_TIMES_OF_COMPOSITE_IMAGE = 'SourceExposureTimesOfCompositeImage';
    private const GAMMA = 'Gamma';

    public static function ExposureTime(): self
    {
        return self::get(self::EXPOSURE_TIME);
    }

    public static function FNumber(): self
    {
        return self::get(self::F_NUMBER);
    }

    public static function ExposureProgram(): self
    {
        return self::get(self::EXPOSURE_PROGRAM);
    }

    public static function SpectralSensitivity(): self
    {
        return self::get(self::SPECTRAL_SENSITIVITY);
    }

    public static function ISOSpeedRatings(): self
    {
        return self::get(self::ISO_SPEED_RATINGS);
    }

    public static function OECF(): self
    {
        return self::get(self::OECF);
    }

    public static function SensitivityType(): self
    {
        return self::get(self::SENSITIVITY_TYPE);
    }

    public static function StandardOutputSensitivity(): self
    {
        return self::get(self::STANDARD_OUTPUT_SENSITIVITY);
    }

    public static function RecommendedExposureIndex(): self
    {
        return self::get(self::RECOMMENDED_EXPOSURE_INDEX);
    }

    public static function ISOSpeed(): self
    {
        return self::get(self::ISO_SPEED);
    }

    public static function ISOSpeedLatitudeyyy(): self
    {
        return self::get(self::ISO_SPEED_LATITUDEYYY);
    }

    public static function ISOSpeedLatitudezzz(): self
    {
        return self::get(self::ISO_SPEED_LATITUDEZZZ);
    }

    public static function ExifVersion(): self
    {
        return self::get(self::EXIF_VERSION);
    }

    public static function DateTimeOriginal(): self
    {
        return self::get(self::DATE_TIME_ORIGINAL);
    }

    public static function DateTimeDigitized(): self
    {
        return self::get(self::DATE_TIME_DIGITIZED);
    }

    public static function OffsetTime(): self
    {
        return self::get(self::OFFSET_TIME);
    }

    public static function OffsetTimeOriginal(): self
    {
        return self::get(self::OFFSET_TIME_ORIGINAL);
    }

    public static function OffsetTimeDigitized(): self
    {
        return self::get(self::OFFSET_TIME_DIGITIZED);
    }

    public static function ComponentsConfiguration(): self
    {
        return self::get(self::COMPONENTS_CONFIGURATION);
    }

    public static function CompressedBitsPerPixel(): self
    {
        return self::get(self::COMPRESSED_BITS_PER_PIXEL);
    }

    public static function ShutterSpeedValue(): self
    {
        return self::get(self::SHUTTER_SPEED_VALUE);
    }

    public static function ApertureValue(): self
    {
        return self::get(self::APERTURE_VALUE);
    }

    public static function BrightnessValue(): self
    {
        return self::get(self::BRIGHTNESS_VALUE);
    }

    public static function ExposureBiasValue(): self
    {
        return self::get(self::EXPOSURE_BIAS_VALUE);
    }

    public static function MaxApertureValue(): self
    {
        return self::get(self::MAX_APERTURE_VALUE);
    }

    public static function SubjectDistance(): self
    {
        return self::get(self::SUBJECT_DISTANCE);
    }

    public static function MeteringMode(): self
    {
        return self::get(self::METERING_MODE);
    }

    public static function LightSource(): self
    {
        return self::get(self::LIGHT_SOURCE);
    }

    public static function Flash(): self
    {
        return self::get(self::FLASH);
    }

    public static function FocalLength(): self
    {
        return self::get(self::FOCAL_LENGTH);
    }

    public static function SubjectArea(): self
    {
        return self::get(self::SUBJECT_AREA);
    }

    public static function MakerNote(): self
    {
        return self::get(self::MAKER_NOTE);
    }

    public static function UserComment(): self
    {
        return self::get(self::USER_COMMENT);
    }

    public static function SubSecTime(): self
    {
        return self::get(self::SUB_SEC_TIME);
    }

    public static function SubSecTimeOriginal(): self
    {
        return self::get(self::SUB_SEC_TIME_ORIGINAL);
    }

    public static function SubSecTimeDigitized(): self
    {
        return self::get(self::SUB_SEC_TIME_DIGITIZED);
    }

    public static function Temperature(): self
    {
        return self::get(self::TEMPERATURE);
    }

    public static function Humidity(): self
    {
        return self::get(self::HUMIDITY);
    }

    public static function Pressure(): self
    {
        return self::get(self::PRESSURE);
    }

    public static function WaterDepth(): self
    {
        return self::get(self::WATER_DEPTH);
    }

    public static function Acceleration(): self
    {
        return self::get(self::ACCELERATION);
    }

    public static function CameraElevationAngle(): self
    {
        return self::get(self::CAMERA_ELEVATION_ANGLE);
    }

    public static function FlashpixVersion(): self
    {
        return self::get(self::FLASHPIX_VERSION);
    }

    public static function ColorSpace(): self
    {
        return self::get(self::COLOR_SPACE);
    }

    public static function PixelXDimension(): self
    {
        return self::get(self::PIXEL_XDIMENSION);
    }

    public static function PixelYDimension(): self
    {
        return self::get(self::PIXEL_YDIMENSION);
    }

    public static function RelatedSoundFile(): self
    {
        return self::get(self::RELATED_SOUND_FILE);
    }

    public static function InteroperabilityTag(): self
    {
        return self::get(self::INTEROPERABILITY_TAG);
    }

    public static function FlashEnergy(): self
    {
        return self::get(self::FLASH_ENERGY);
    }

    public static function SpatialFrequencyResponse(): self
    {
        return self::get(self::SPATIAL_FREQUENCY_RESPONSE);
    }

    public static function FocalPlaneXResolution(): self
    {
        return self::get(self::FOCAL_PLANE_XRESOLUTION);
    }

    public static function FocalPlaneYResolution(): self
    {
        return self::get(self::FOCAL_PLANE_YRESOLUTION);
    }

    public static function FocalPlaneResolutionUnit(): self
    {
        return self::get(self::FOCAL_PLANE_RESOLUTION_UNIT);
    }

    public static function SubjectLocation(): self
    {
        return self::get(self::SUBJECT_LOCATION);
    }

    public static function ExposureIndex(): self
    {
        return self::get(self::EXPOSURE_INDEX);
    }

    public static function SensingMethod(): self
    {
        return self::get(self::SENSING_METHOD);
    }

    public static function FileSource(): self
    {
        return self::get(self::FILE_SOURCE);
    }

    public static function SceneType(): self
    {
        return self::get(self::SCENE_TYPE);
    }

    public static function CFAPattern(): self
    {
        return self::get(self::CFA_PATTERN);
    }

    public static function CustomRendered(): self
    {
        return self::get(self::CUSTOM_RENDERED);
    }

    public static function ExposureMode(): self
    {
        return self::get(self::EXPOSURE_MODE);
    }

    public static function WhiteBalance(): self
    {
        return self::get(self::WHITE_BALANCE);
    }

    public static function DigitalZoomRatio(): self
    {
        return self::get(self::DIGITAL_ZOOM_RATIO);
    }

    public static function FocalLengthIn35mmFilm(): self
    {
        return self::get(self::FOCAL_LENGTH_IN_35_MM_FILM);
    }

    public static function SceneCaptureType(): self
    {
        return self::get(self::SCENE_CAPTURE_TYPE);
    }

    public static function GainControl(): self
    {
        return self::get(self::GAIN_CONTROL);
    }

    public static function Contrast(): self
    {
        return self::get(self::CONTRAST);
    }

    public static function Saturation(): self
    {
        return self::get(self::SATURATION);
    }

    public static function Sharpness(): self
    {
        return self::get(self::SHARPNESS);
    }

    public static function DeviceSettingDescription(): self
    {
        return self::get(self::DEVICE_SETTING_DESCRIPTION);
    }

    public static function SubjectDistanceRange(): self
    {
        return self::get(self::SUBJECT_DISTANCE_RANGE);
    }

    public static function ImageUniqueID(): self
    {
        return self::get(self::IMAGE_UNIQUE_ID);
    }

    public static function CameraOwnerName(): self
    {
        return self::get(self::CAMERA_OWNER_NAME);
    }

    public static function BodySerialNumber(): self
    {
        return self::get(self::BODY_SERIAL_NUMBER);
    }

    public static function LensSpecification(): self
    {
        return self::get(self::LENS_SPECIFICATION);
    }

    public static function LensMake(): self
    {
        return self::get(self::LENS_MAKE);
    }

    public static function LensModel(): self
    {
        return self::get(self::LENS_MODEL);
    }

    public static function LensSerialNumber(): self
    {
        return self::get(self::LENS_SERIAL_NUMBER);
    }

    public static function CompositeImage(): self
    {
        return self::get(self::COMPOSITE_IMAGE);
    }

    public static function SourceImageNumberOfCompositeImage(): self
    {
        return self::get(self::SOURCE_IMAGE_NUMBER_OF_COMPOSITE_IMAGE);
    }

    public static function SourceExposureTimesOfCompositeImage(): self
    {
        return self::get(self::SOURCE_EXPOSURE_TIMES_OF_COMPOSITE_IMAGE);
    }

    public static function Gamma(): self
    {
        return self::get(self::GAMMA);
    }

    public static function fromString(string $value): self
    {
        return self::get($value);
    }
}
