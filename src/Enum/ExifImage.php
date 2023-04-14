<?php declare(strict_types=1);

namespace App\Enum;

use Patchlevel\Enum\Enum;

/**
 * @psalm-immutable
 */
class ExifImage extends Enum
{
    private const PROCESSING_SOFTWARE = 'ProcessingSoftware';
    private const NEW_SUBFILE_TYPE = 'NewSubfileType';
    private const SUBFILE_TYPE = 'SubfileType';
    private const IMAGE_WIDTH = 'ImageWidth';
    private const IMAGE_LENGTH = 'ImageLength';
    private const BITS_PER_SAMPLE = 'BitsPerSample';
    private const COMPRESSION = 'Compression';
    private const PHOTOMETRIC_INTERPRETATION = 'PhotometricInterpretation';
    private const THRESHOLDING = 'Thresholding';
    private const CELL_WIDTH = 'CellWidth';
    private const CELL_LENGTH = 'CellLength';
    private const FILL_ORDER = 'FillOrder';
    private const DOCUMENT_NAME = 'DocumentName';
    private const IMAGE_DESCRIPTION = 'ImageDescription';
    private const MAKE = 'Make';
    private const MODEL = 'Model';
    private const STRIP_OFFSETS = 'StripOffsets';
    private const ORIENTATION = 'Orientation';
    private const SAMPLES_PER_PIXEL = 'SamplesPerPixel';
    private const ROWS_PER_STRIP = 'RowsPerStrip';
    private const STRIP_BYTE_COUNTS = 'StripByteCounts';
    private const X_RESOLUTION = 'XResolution';
    private const Y_RESOLUTION = 'YResolution';
    private const PLANAR_CONFIGURATION = 'PlanarConfiguration';
    private const PAGE_NAME = 'PageName';
    private const X_POSITION = 'XPosition';
    private const Y_POSITION = 'YPosition';
    private const GRAY_RESPONSE_UNIT = 'GrayResponseUnit';
    private const GRAY_RESPONSE_CURVE = 'GrayResponseCurve';
    private const T_4_OPTIONS = 'T4Options';
    private const T_6_OPTIONS = 'T6Options';
    private const RESOLUTION_UNIT = 'ResolutionUnit';
    private const PAGE_NUMBER = 'PageNumber';
    private const TRANSFER_FUNCTION = 'TransferFunction';
    private const SOFTWARE = 'Software';
    private const DATE_TIME = 'DateTime';
    private const ARTIST = 'Artist';
    private const HOST_COMPUTER = 'HostComputer';
    private const PREDICTOR = 'Predictor';
    private const WHITE_POINT = 'WhitePoint';
    private const PRIMARY_CHROMATICITIES = 'PrimaryChromaticities';
    private const COLOR_MAP = 'ColorMap';
    private const HALFTONE_HINTS = 'HalftoneHints';
    private const TILE_WIDTH = 'TileWidth';
    private const TILE_LENGTH = 'TileLength';
    private const TILE_OFFSETS = 'TileOffsets';
    private const TILE_BYTE_COUNTS = 'TileByteCounts';
    private const SUB_IF_DS = 'SubIFDs';
    private const INK_SET = 'InkSet';
    private const INK_NAMES = 'InkNames';
    private const NUMBER_OF_INKS = 'NumberOfInks';
    private const DOT_RANGE = 'DotRange';
    private const TARGET_PRINTER = 'TargetPrinter';
    private const EXTRA_SAMPLES = 'ExtraSamples';
    private const SAMPLE_FORMAT = 'SampleFormat';
    private const S_MIN_SAMPLE_VALUE = 'SMinSampleValue';
    private const S_MAX_SAMPLE_VALUE = 'SMaxSampleValue';
    private const TRANSFER_RANGE = 'TransferRange';
    private const CLIP_PATH = 'ClipPath';
    private const X_CLIP_PATH_UNITS = 'XClipPathUnits';
    private const Y_CLIP_PATH_UNITS = 'YClipPathUnits';
    private const INDEXED = 'Indexed';
    private const JPEG_TABLES = 'JPEGTables';
    private const OPI_PROXY = 'OPIProxy';
    private const JPEG_PROC = 'JPEGProc';
    private const JPEG_INTERCHANGE_FORMAT = 'JPEGInterchangeFormat';
    private const JPEG_INTERCHANGE_FORMAT_LENGTH = 'JPEGInterchangeFormatLength';
    private const JPEG_RESTART_INTERVAL = 'JPEGRestartInterval';
    private const JPEG_LOSSLESS_PREDICTORS = 'JPEGLosslessPredictors';
    private const JPEG_POINT_TRANSFORMS = 'JPEGPointTransforms';
    private const JPEGQ_TABLES = 'JPEGQTables';
    private const JPEGDC_TABLES = 'JPEGDCTables';
    private const JPEGAC_TABLES = 'JPEGACTables';
    private const Y_CB_CR_COEFFICIENTS = 'YCbCrCoefficients';
    private const Y_CB_CR_SUB_SAMPLING = 'YCbCrSubSampling';
    private const Y_CB_CR_POSITIONING = 'YCbCrPositioning';
    private const REFERENCE_BLACK_WHITE = 'ReferenceBlackWhite';
    private const XML_PACKET = 'XMLPacket';
    private const RATING = 'Rating';
    private const RATING_PERCENT = 'RatingPercent';
    private const VIGNETTING_CORR_PARAMS = 'VignettingCorrParams';
    private const CHROMATIC_ABERRATION_CORR_PARAMS = 'ChromaticAberrationCorrParams';
    private const DISTORTION_CORR_PARAMS = 'DistortionCorrParams';
    private const IMAGE_ID = 'ImageID';
    private const CFA_REPEAT_PATTERN_DIM = 'CFARepeatPatternDim';
    private const CFA_PATTERN = 'CFAPattern';
    private const BATTERY_LEVEL = 'BatteryLevel';
    private const COPYRIGHT = 'Copyright';
    private const EXPOSURE_TIME = 'ExposureTime';
    private const F_NUMBER = 'FNumber';
    private const IPTCNAA = 'IPTCNAA';
    private const IMAGE_RESOURCES = 'ImageResources';
    private const EXIF_TAG = 'ExifTag';
    private const INTER_COLOR_PROFILE = 'InterColorProfile';
    private const EXPOSURE_PROGRAM = 'ExposureProgram';
    private const SPECTRAL_SENSITIVITY = 'SpectralSensitivity';
    private const GPS_TAG = 'GPSTag';
    private const ISO_SPEED_RATINGS = 'ISOSpeedRatings';
    private const OECF = 'OECF';
    private const INTERLACE = 'Interlace';
    private const TIME_ZONE_OFFSET = 'TimeZoneOffset';
    private const SELF_TIMER_MODE = 'SelfTimerMode';
    private const DATE_TIME_ORIGINAL = 'DateTimeOriginal';
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
    private const FLASH_ENERGY = 'FlashEnergy';
    private const SPATIAL_FREQUENCY_RESPONSE = 'SpatialFrequencyResponse';
    private const NOISE = 'Noise';
    private const FOCAL_PLANE_XRESOLUTION = 'FocalPlaneXResolution';
    private const FOCAL_PLANE_YRESOLUTION = 'FocalPlaneYResolution';
    private const FOCAL_PLANE_RESOLUTION_UNIT = 'FocalPlaneResolutionUnit';
    private const IMAGE_NUMBER = 'ImageNumber';
    private const SECURITY_CLASSIFICATION = 'SecurityClassification';
    private const IMAGE_HISTORY = 'ImageHistory';
    private const SUBJECT_LOCATION = 'SubjectLocation';
    private const EXPOSURE_INDEX = 'ExposureIndex';
    private const TIFFEP_STANDARD_ID = 'TIFFEPStandardID';
    private const SENSING_METHOD = 'SensingMethod';
    private const XP_TITLE = 'XPTitle';
    private const XP_COMMENT = 'XPComment';
    private const XP_AUTHOR = 'XPAuthor';
    private const XP_KEYWORDS = 'XPKeywords';
    private const XP_SUBJECT = 'XPSubject';
    private const PRINT_IMAGE_MATCHING = 'PrintImageMatching';
    private const DNG_VERSION = 'DNGVersion';
    private const DNG_BACKWARD_VERSION = 'DNGBackwardVersion';
    private const UNIQUE_CAMERA_MODEL = 'UniqueCameraModel';
    private const LOCALIZED_CAMERA_MODEL = 'LocalizedCameraModel';
    private const CFA_PLANE_COLOR = 'CFAPlaneColor';
    private const CFA_LAYOUT = 'CFALayout';
    private const LINEARIZATION_TABLE = 'LinearizationTable';
    private const BLACK_LEVEL_REPEAT_DIM = 'BlackLevelRepeatDim';
    private const BLACK_LEVEL = 'BlackLevel';
    private const BLACK_LEVEL_DELTA_H = 'BlackLevelDeltaH';
    private const BLACK_LEVEL_DELTA_V = 'BlackLevelDeltaV';
    private const WHITE_LEVEL = 'WhiteLevel';
    private const DEFAULT_SCALE = 'DefaultScale';
    private const DEFAULT_CROP_ORIGIN = 'DefaultCropOrigin';
    private const DEFAULT_CROP_SIZE = 'DefaultCropSize';
    private const COLOR_MATRIX_1 = 'ColorMatrix1';
    private const COLOR_MATRIX_2 = 'ColorMatrix2';
    private const CAMERA_CALIBRATION_1 = 'CameraCalibration1';
    private const CAMERA_CALIBRATION_2 = 'CameraCalibration2';
    private const REDUCTION_MATRIX_1 = 'ReductionMatrix1';
    private const REDUCTION_MATRIX_2 = 'ReductionMatrix2';
    private const ANALOG_BALANCE = 'AnalogBalance';
    private const AS_SHOT_NEUTRAL = 'AsShotNeutral';
    private const AS_SHOT_WHITE_XY = 'AsShotWhiteXY';
    private const BASELINE_EXPOSURE = 'BaselineExposure';
    private const BASELINE_NOISE = 'BaselineNoise';
    private const BASELINE_SHARPNESS = 'BaselineSharpness';
    private const BAYER_GREEN_SPLIT = 'BayerGreenSplit';
    private const LINEAR_RESPONSE_LIMIT = 'LinearResponseLimit';
    private const CAMERA_SERIAL_NUMBER = 'CameraSerialNumber';
    private const LENS_INFO = 'LensInfo';
    private const CHROMA_BLUR_RADIUS = 'ChromaBlurRadius';
    private const ANTI_ALIAS_STRENGTH = 'AntiAliasStrength';
    private const SHADOW_SCALE = 'ShadowScale';
    private const DNG_PRIVATE_DATA = 'DNGPrivateData';
    private const MAKER_NOTE_SAFETY = 'MakerNoteSafety';
    private const CALIBRATION_ILLUMINANT_1 = 'CalibrationIlluminant1';
    private const CALIBRATION_ILLUMINANT_2 = 'CalibrationIlluminant2';
    private const BEST_QUALITY_SCALE = 'BestQualityScale';
    private const RAW_DATA_UNIQUE_ID = 'RawDataUniqueID';
    private const ORIGINAL_RAW_FILE_NAME = 'OriginalRawFileName';
    private const ORIGINAL_RAW_FILE_DATA = 'OriginalRawFileData';
    private const ACTIVE_AREA = 'ActiveArea';
    private const MASKED_AREAS = 'MaskedAreas';
    private const AS_SHOT_ICC_PROFILE = 'AsShotICCProfile';
    private const AS_SHOT_PRE_PROFILE_MATRIX = 'AsShotPreProfileMatrix';
    private const CURRENT_ICC_PROFILE = 'CurrentICCProfile';
    private const CURRENT_PRE_PROFILE_MATRIX = 'CurrentPreProfileMatrix';
    private const COLORIMETRIC_REFERENCE = 'ColorimetricReference';
    private const CAMERA_CALIBRATION_SIGNATURE = 'CameraCalibrationSignature';
    private const PROFILE_CALIBRATION_SIGNATURE = 'ProfileCalibrationSignature';
    private const EXTRA_CAMERA_PROFILES = 'ExtraCameraProfiles';
    private const AS_SHOT_PROFILE_NAME = 'AsShotProfileName';
    private const NOISE_REDUCTION_APPLIED = 'NoiseReductionApplied';
    private const PROFILE_NAME = 'ProfileName';
    private const PROFILE_HUE_SAT_MAP_DIMS = 'ProfileHueSatMapDims';
    private const PROFILE_HUE_SAT_MAP_DATA_1 = 'ProfileHueSatMapData1';
    private const PROFILE_HUE_SAT_MAP_DATA_2 = 'ProfileHueSatMapData2';
    private const PROFILE_TONE_CURVE = 'ProfileToneCurve';
    private const PROFILE_EMBED_POLICY = 'ProfileEmbedPolicy';
    private const PROFILE_COPYRIGHT = 'ProfileCopyright';
    private const FORWARD_MATRIX_1 = 'ForwardMatrix1';
    private const FORWARD_MATRIX_2 = 'ForwardMatrix2';
    private const PREVIEW_APPLICATION_NAME = 'PreviewApplicationName';
    private const PREVIEW_APPLICATION_VERSION = 'PreviewApplicationVersion';
    private const PREVIEW_SETTINGS_NAME = 'PreviewSettingsName';
    private const PREVIEW_SETTINGS_DIGEST = 'PreviewSettingsDigest';
    private const PREVIEW_COLOR_SPACE = 'PreviewColorSpace';
    private const PREVIEW_DATE_TIME = 'PreviewDateTime';
    private const RAW_IMAGE_DIGEST = 'RawImageDigest';
    private const ORIGINAL_RAW_FILE_DIGEST = 'OriginalRawFileDigest';
    private const SUB_TILE_BLOCK_SIZE = 'SubTileBlockSize';
    private const ROW_INTERLEAVE_FACTOR = 'RowInterleaveFactor';
    private const PROFILE_LOOK_TABLE_DIMS = 'ProfileLookTableDims';
    private const PROFILE_LOOK_TABLE_DATA = 'ProfileLookTableData';
    private const OPCODE_LIST_1 = 'OpcodeList1';
    private const OPCODE_LIST_2 = 'OpcodeList2';
    private const OPCODE_LIST_3 = 'OpcodeList3';
    private const NOISE_PROFILE = 'NoiseProfile';
    private const TIME_CODES = 'TimeCodes';
    private const FRAME_RATE = 'FrameRate';
    private const T_STOP = 'TStop';
    private const REEL_NAME = 'ReelName';
    private const CAMERA_LABEL = 'CameraLabel';
    private const ORIGINAL_DEFAULT_FINAL_SIZE = 'OriginalDefaultFinalSize';
    private const ORIGINAL_BEST_QUALITY_FINAL_SIZE = 'OriginalBestQualityFinalSize';
    private const ORIGINAL_DEFAULT_CROP_SIZE = 'OriginalDefaultCropSize';
    private const PROFILE_HUE_SAT_MAP_ENCODING = 'ProfileHueSatMapEncoding';
    private const PROFILE_LOOK_TABLE_ENCODING = 'ProfileLookTableEncoding';
    private const BASELINE_EXPOSURE_OFFSET = 'BaselineExposureOffset';
    private const DEFAULT_BLACK_RENDER = 'DefaultBlackRender';
    private const NEW_RAW_IMAGE_DIGEST = 'NewRawImageDigest';
    private const RAW_TO_PREVIEW_GAIN = 'RawToPreviewGain';
    private const DEFAULT_USER_CROP = 'DefaultUserCrop';
    private const DEPTH_FORMAT = 'DepthFormat';
    private const DEPTH_NEAR = 'DepthNear';
    private const DEPTH_FAR = 'DepthFar';
    private const DEPTH_UNITS = 'DepthUnits';
    private const DEPTH_MEASURE_TYPE = 'DepthMeasureType';
    private const ENHANCE_PARAMS = 'EnhanceParams';
    private const PROFILE_GAIN_TABLE_MAP = 'ProfileGainTableMap';
    private const SEMANTIC_NAME = 'SemanticName';
    private const SEMANTIC_INSTANCE_ID = 'SemanticInstanceID';
    private const CALIBRATION_ILLUMINANT_3 = 'CalibrationIlluminant3';
    private const CAMERA_CALIBRATION_3 = 'CameraCalibration3';
    private const COLOR_MATRIX_3 = 'ColorMatrix3';
    private const FORWARD_MATRIX_3 = 'ForwardMatrix3';
    private const ILLUMINANT_DATA_1 = 'IlluminantData1';
    private const ILLUMINANT_DATA_2 = 'IlluminantData2';
    private const ILLUMINANT_DATA_3 = 'IlluminantData3';
    private const MASK_SUB_AREA = 'MaskSubArea';
    private const PROFILE_HUE_SAT_MAP_DATA_3 = 'ProfileHueSatMapData3';
    private const REDUCTION_MATRIX_3 = 'ReductionMatrix3';
    private const RGB_TABLES = 'RGBTables';

    public static function ProcessingSoftware(): self
    {
        return self::get(self::PROCESSING_SOFTWARE);
    }

    public static function NewSubfileType(): self
    {
        return self::get(self::NEW_SUBFILE_TYPE);
    }

    public static function SubfileType(): self
    {
        return self::get(self::SUBFILE_TYPE);
    }

    public static function ImageWidth(): self
    {
        return self::get(self::IMAGE_WIDTH);
    }

    public static function ImageLength(): self
    {
        return self::get(self::IMAGE_LENGTH);
    }

    public static function BitsPerSample(): self
    {
        return self::get(self::BITS_PER_SAMPLE);
    }

    public static function Compression(): self
    {
        return self::get(self::COMPRESSION);
    }

    public static function PhotometricInterpretation(): self
    {
        return self::get(self::PHOTOMETRIC_INTERPRETATION);
    }

    public static function Thresholding(): self
    {
        return self::get(self::THRESHOLDING);
    }

    public static function CellWidth(): self
    {
        return self::get(self::CELL_WIDTH);
    }

    public static function CellLength(): self
    {
        return self::get(self::CELL_LENGTH);
    }

    public static function FillOrder(): self
    {
        return self::get(self::FILL_ORDER);
    }

    public static function DocumentName(): self
    {
        return self::get(self::DOCUMENT_NAME);
    }

    public static function ImageDescription(): self
    {
        return self::get(self::IMAGE_DESCRIPTION);
    }

    public static function Make(): self
    {
        return self::get(self::MAKE);
    }

    public static function Model(): self
    {
        return self::get(self::MODEL);
    }

    public static function StripOffsets(): self
    {
        return self::get(self::STRIP_OFFSETS);
    }

    public static function Orientation(): self
    {
        return self::get(self::ORIENTATION);
    }

    public static function SamplesPerPixel(): self
    {
        return self::get(self::SAMPLES_PER_PIXEL);
    }

    public static function RowsPerStrip(): self
    {
        return self::get(self::ROWS_PER_STRIP);
    }

    public static function StripByteCounts(): self
    {
        return self::get(self::STRIP_BYTE_COUNTS);
    }

    public static function XResolution(): self
    {
        return self::get(self::X_RESOLUTION);
    }

    public static function YResolution(): self
    {
        return self::get(self::Y_RESOLUTION);
    }

    public static function PlanarConfiguration(): self
    {
        return self::get(self::PLANAR_CONFIGURATION);
    }

    public static function PageName(): self
    {
        return self::get(self::PAGE_NAME);
    }

    public static function XPosition(): self
    {
        return self::get(self::X_POSITION);
    }

    public static function YPosition(): self
    {
        return self::get(self::Y_POSITION);
    }

    public static function GrayResponseUnit(): self
    {
        return self::get(self::GRAY_RESPONSE_UNIT);
    }

    public static function GrayResponseCurve(): self
    {
        return self::get(self::GRAY_RESPONSE_CURVE);
    }

    public static function T4Options(): self
    {
        return self::get(self::T_4_OPTIONS);
    }

    public static function T6Options(): self
    {
        return self::get(self::T_6_OPTIONS);
    }

    public static function ResolutionUnit(): self
    {
        return self::get(self::RESOLUTION_UNIT);
    }

    public static function PageNumber(): self
    {
        return self::get(self::PAGE_NUMBER);
    }

    public static function TransferFunction(): self
    {
        return self::get(self::TRANSFER_FUNCTION);
    }

    public static function Software(): self
    {
        return self::get(self::SOFTWARE);
    }

    public static function DateTime(): self
    {
        return self::get(self::DATE_TIME);
    }

    public static function Artist(): self
    {
        return self::get(self::ARTIST);
    }

    public static function HostComputer(): self
    {
        return self::get(self::HOST_COMPUTER);
    }

    public static function Predictor(): self
    {
        return self::get(self::PREDICTOR);
    }

    public static function WhitePoint(): self
    {
        return self::get(self::WHITE_POINT);
    }

    public static function PrimaryChromaticities(): self
    {
        return self::get(self::PRIMARY_CHROMATICITIES);
    }

    public static function ColorMap(): self
    {
        return self::get(self::COLOR_MAP);
    }

    public static function HalftoneHints(): self
    {
        return self::get(self::HALFTONE_HINTS);
    }

    public static function TileWidth(): self
    {
        return self::get(self::TILE_WIDTH);
    }

    public static function TileLength(): self
    {
        return self::get(self::TILE_LENGTH);
    }

    public static function TileOffsets(): self
    {
        return self::get(self::TILE_OFFSETS);
    }

    public static function TileByteCounts(): self
    {
        return self::get(self::TILE_BYTE_COUNTS);
    }

    public static function SubIFDs(): self
    {
        return self::get(self::SUB_IF_DS);
    }

    public static function InkSet(): self
    {
        return self::get(self::INK_SET);
    }

    public static function InkNames(): self
    {
        return self::get(self::INK_NAMES);
    }

    public static function NumberOfInks(): self
    {
        return self::get(self::NUMBER_OF_INKS);
    }

    public static function DotRange(): self
    {
        return self::get(self::DOT_RANGE);
    }

    public static function TargetPrinter(): self
    {
        return self::get(self::TARGET_PRINTER);
    }

    public static function ExtraSamples(): self
    {
        return self::get(self::EXTRA_SAMPLES);
    }

    public static function SampleFormat(): self
    {
        return self::get(self::SAMPLE_FORMAT);
    }

    public static function SMinSampleValue(): self
    {
        return self::get(self::S_MIN_SAMPLE_VALUE);
    }

    public static function SMaxSampleValue(): self
    {
        return self::get(self::S_MAX_SAMPLE_VALUE);
    }

    public static function TransferRange(): self
    {
        return self::get(self::TRANSFER_RANGE);
    }

    public static function ClipPath(): self
    {
        return self::get(self::CLIP_PATH);
    }

    public static function XClipPathUnits(): self
    {
        return self::get(self::X_CLIP_PATH_UNITS);
    }

    public static function YClipPathUnits(): self
    {
        return self::get(self::Y_CLIP_PATH_UNITS);
    }

    public static function Indexed(): self
    {
        return self::get(self::INDEXED);
    }

    public static function JPEGTables(): self
    {
        return self::get(self::JPEG_TABLES);
    }

    public static function OPIProxy(): self
    {
        return self::get(self::OPI_PROXY);
    }

    public static function JPEGProc(): self
    {
        return self::get(self::JPEG_PROC);
    }

    public static function JPEGInterchangeFormat(): self
    {
        return self::get(self::JPEG_INTERCHANGE_FORMAT);
    }

    public static function JPEGInterchangeFormatLength(): self
    {
        return self::get(self::JPEG_INTERCHANGE_FORMAT_LENGTH);
    }

    public static function JPEGRestartInterval(): self
    {
        return self::get(self::JPEG_RESTART_INTERVAL);
    }

    public static function JPEGLosslessPredictors(): self
    {
        return self::get(self::JPEG_LOSSLESS_PREDICTORS);
    }

    public static function JPEGPointTransforms(): self
    {
        return self::get(self::JPEG_POINT_TRANSFORMS);
    }

    public static function JPEGQTables(): self
    {
        return self::get(self::JPEGQ_TABLES);
    }

    public static function JPEGDCTables(): self
    {
        return self::get(self::JPEGDC_TABLES);
    }

    public static function JPEGACTables(): self
    {
        return self::get(self::JPEGAC_TABLES);
    }

    public static function YCbCrCoefficients(): self
    {
        return self::get(self::Y_CB_CR_COEFFICIENTS);
    }

    public static function YCbCrSubSampling(): self
    {
        return self::get(self::Y_CB_CR_SUB_SAMPLING);
    }

    public static function YCbCrPositioning(): self
    {
        return self::get(self::Y_CB_CR_POSITIONING);
    }

    public static function ReferenceBlackWhite(): self
    {
        return self::get(self::REFERENCE_BLACK_WHITE);
    }

    public static function XMLPacket(): self
    {
        return self::get(self::XML_PACKET);
    }

    public static function Rating(): self
    {
        return self::get(self::RATING);
    }

    public static function RatingPercent(): self
    {
        return self::get(self::RATING_PERCENT);
    }

    public static function VignettingCorrParams(): self
    {
        return self::get(self::VIGNETTING_CORR_PARAMS);
    }

    public static function ChromaticAberrationCorrParams(): self
    {
        return self::get(self::CHROMATIC_ABERRATION_CORR_PARAMS);
    }

    public static function DistortionCorrParams(): self
    {
        return self::get(self::DISTORTION_CORR_PARAMS);
    }

    public static function ImageID(): self
    {
        return self::get(self::IMAGE_ID);
    }

    public static function CFARepeatPatternDim(): self
    {
        return self::get(self::CFA_REPEAT_PATTERN_DIM);
    }

    public static function CFAPattern(): self
    {
        return self::get(self::CFA_PATTERN);
    }

    public static function BatteryLevel(): self
    {
        return self::get(self::BATTERY_LEVEL);
    }

    public static function Copyright(): self
    {
        return self::get(self::COPYRIGHT);
    }

    public static function ExposureTime(): self
    {
        return self::get(self::EXPOSURE_TIME);
    }

    public static function FNumber(): self
    {
        return self::get(self::F_NUMBER);
    }

    public static function IPTCNAA(): self
    {
        return self::get(self::IPTCNAA);
    }

    public static function ImageResources(): self
    {
        return self::get(self::IMAGE_RESOURCES);
    }

    public static function ExifTag(): self
    {
        return self::get(self::EXIF_TAG);
    }

    public static function InterColorProfile(): self
    {
        return self::get(self::INTER_COLOR_PROFILE);
    }

    public static function ExposureProgram(): self
    {
        return self::get(self::EXPOSURE_PROGRAM);
    }

    public static function SpectralSensitivity(): self
    {
        return self::get(self::SPECTRAL_SENSITIVITY);
    }

    public static function GPSTag(): self
    {
        return self::get(self::GPS_TAG);
    }

    public static function ISOSpeedRatings(): self
    {
        return self::get(self::ISO_SPEED_RATINGS);
    }

    public static function OECF(): self
    {
        return self::get(self::OECF);
    }

    public static function Interlace(): self
    {
        return self::get(self::INTERLACE);
    }

    public static function TimeZoneOffset(): self
    {
        return self::get(self::TIME_ZONE_OFFSET);
    }

    public static function SelfTimerMode(): self
    {
        return self::get(self::SELF_TIMER_MODE);
    }

    public static function DateTimeOriginal(): self
    {
        return self::get(self::DATE_TIME_ORIGINAL);
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

    public static function FlashEnergy(): self
    {
        return self::get(self::FLASH_ENERGY);
    }

    public static function SpatialFrequencyResponse(): self
    {
        return self::get(self::SPATIAL_FREQUENCY_RESPONSE);
    }

    public static function Noise(): self
    {
        return self::get(self::NOISE);
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

    public static function ImageNumber(): self
    {
        return self::get(self::IMAGE_NUMBER);
    }

    public static function SecurityClassification(): self
    {
        return self::get(self::SECURITY_CLASSIFICATION);
    }

    public static function ImageHistory(): self
    {
        return self::get(self::IMAGE_HISTORY);
    }

    public static function SubjectLocation(): self
    {
        return self::get(self::SUBJECT_LOCATION);
    }

    public static function ExposureIndex(): self
    {
        return self::get(self::EXPOSURE_INDEX);
    }

    public static function TIFFEPStandardID(): self
    {
        return self::get(self::TIFFEP_STANDARD_ID);
    }

    public static function SensingMethod(): self
    {
        return self::get(self::SENSING_METHOD);
    }

    public static function XPTitle(): self
    {
        return self::get(self::XP_TITLE);
    }

    public static function XPComment(): self
    {
        return self::get(self::XP_COMMENT);
    }

    public static function XPAuthor(): self
    {
        return self::get(self::XP_AUTHOR);
    }

    public static function XPKeywords(): self
    {
        return self::get(self::XP_KEYWORDS);
    }

    public static function XPSubject(): self
    {
        return self::get(self::XP_SUBJECT);
    }

    public static function PrintImageMatching(): self
    {
        return self::get(self::PRINT_IMAGE_MATCHING);
    }

    public static function DNGVersion(): self
    {
        return self::get(self::DNG_VERSION);
    }

    public static function DNGBackwardVersion(): self
    {
        return self::get(self::DNG_BACKWARD_VERSION);
    }

    public static function UniqueCameraModel(): self
    {
        return self::get(self::UNIQUE_CAMERA_MODEL);
    }

    public static function LocalizedCameraModel(): self
    {
        return self::get(self::LOCALIZED_CAMERA_MODEL);
    }

    public static function CFAPlaneColor(): self
    {
        return self::get(self::CFA_PLANE_COLOR);
    }

    public static function CFALayout(): self
    {
        return self::get(self::CFA_LAYOUT);
    }

    public static function LinearizationTable(): self
    {
        return self::get(self::LINEARIZATION_TABLE);
    }

    public static function BlackLevelRepeatDim(): self
    {
        return self::get(self::BLACK_LEVEL_REPEAT_DIM);
    }

    public static function BlackLevel(): self
    {
        return self::get(self::BLACK_LEVEL);
    }

    public static function BlackLevelDeltaH(): self
    {
        return self::get(self::BLACK_LEVEL_DELTA_H);
    }

    public static function BlackLevelDeltaV(): self
    {
        return self::get(self::BLACK_LEVEL_DELTA_V);
    }

    public static function WhiteLevel(): self
    {
        return self::get(self::WHITE_LEVEL);
    }

    public static function DefaultScale(): self
    {
        return self::get(self::DEFAULT_SCALE);
    }

    public static function DefaultCropOrigin(): self
    {
        return self::get(self::DEFAULT_CROP_ORIGIN);
    }

    public static function DefaultCropSize(): self
    {
        return self::get(self::DEFAULT_CROP_SIZE);
    }

    public static function ColorMatrix1(): self
    {
        return self::get(self::COLOR_MATRIX_1);
    }

    public static function ColorMatrix2(): self
    {
        return self::get(self::COLOR_MATRIX_2);
    }

    public static function CameraCalibration1(): self
    {
        return self::get(self::CAMERA_CALIBRATION_1);
    }

    public static function CameraCalibration2(): self
    {
        return self::get(self::CAMERA_CALIBRATION_2);
    }

    public static function ReductionMatrix1(): self
    {
        return self::get(self::REDUCTION_MATRIX_1);
    }

    public static function ReductionMatrix2(): self
    {
        return self::get(self::REDUCTION_MATRIX_2);
    }

    public static function AnalogBalance(): self
    {
        return self::get(self::ANALOG_BALANCE);
    }

    public static function AsShotNeutral(): self
    {
        return self::get(self::AS_SHOT_NEUTRAL);
    }

    public static function AsShotWhiteXY(): self
    {
        return self::get(self::AS_SHOT_WHITE_XY);
    }

    public static function BaselineExposure(): self
    {
        return self::get(self::BASELINE_EXPOSURE);
    }

    public static function BaselineNoise(): self
    {
        return self::get(self::BASELINE_NOISE);
    }

    public static function BaselineSharpness(): self
    {
        return self::get(self::BASELINE_SHARPNESS);
    }

    public static function BayerGreenSplit(): self
    {
        return self::get(self::BAYER_GREEN_SPLIT);
    }

    public static function LinearResponseLimit(): self
    {
        return self::get(self::LINEAR_RESPONSE_LIMIT);
    }

    public static function CameraSerialNumber(): self
    {
        return self::get(self::CAMERA_SERIAL_NUMBER);
    }

    public static function LensInfo(): self
    {
        return self::get(self::LENS_INFO);
    }

    public static function ChromaBlurRadius(): self
    {
        return self::get(self::CHROMA_BLUR_RADIUS);
    }

    public static function AntiAliasStrength(): self
    {
        return self::get(self::ANTI_ALIAS_STRENGTH);
    }

    public static function ShadowScale(): self
    {
        return self::get(self::SHADOW_SCALE);
    }

    public static function DNGPrivateData(): self
    {
        return self::get(self::DNG_PRIVATE_DATA);
    }

    public static function MakerNoteSafety(): self
    {
        return self::get(self::MAKER_NOTE_SAFETY);
    }

    public static function CalibrationIlluminant1(): self
    {
        return self::get(self::CALIBRATION_ILLUMINANT_1);
    }

    public static function CalibrationIlluminant2(): self
    {
        return self::get(self::CALIBRATION_ILLUMINANT_2);
    }

    public static function BestQualityScale(): self
    {
        return self::get(self::BEST_QUALITY_SCALE);
    }

    public static function RawDataUniqueID(): self
    {
        return self::get(self::RAW_DATA_UNIQUE_ID);
    }

    public static function OriginalRawFileName(): self
    {
        return self::get(self::ORIGINAL_RAW_FILE_NAME);
    }

    public static function OriginalRawFileData(): self
    {
        return self::get(self::ORIGINAL_RAW_FILE_DATA);
    }

    public static function ActiveArea(): self
    {
        return self::get(self::ACTIVE_AREA);
    }

    public static function MaskedAreas(): self
    {
        return self::get(self::MASKED_AREAS);
    }

    public static function AsShotICCProfile(): self
    {
        return self::get(self::AS_SHOT_ICC_PROFILE);
    }

    public static function AsShotPreProfileMatrix(): self
    {
        return self::get(self::AS_SHOT_PRE_PROFILE_MATRIX);
    }

    public static function CurrentICCProfile(): self
    {
        return self::get(self::CURRENT_ICC_PROFILE);
    }

    public static function CurrentPreProfileMatrix(): self
    {
        return self::get(self::CURRENT_PRE_PROFILE_MATRIX);
    }

    public static function ColorimetricReference(): self
    {
        return self::get(self::COLORIMETRIC_REFERENCE);
    }

    public static function CameraCalibrationSignature(): self
    {
        return self::get(self::CAMERA_CALIBRATION_SIGNATURE);
    }

    public static function ProfileCalibrationSignature(): self
    {
        return self::get(self::PROFILE_CALIBRATION_SIGNATURE);
    }

    public static function ExtraCameraProfiles(): self
    {
        return self::get(self::EXTRA_CAMERA_PROFILES);
    }

    public static function AsShotProfileName(): self
    {
        return self::get(self::AS_SHOT_PROFILE_NAME);
    }

    public static function NoiseReductionApplied(): self
    {
        return self::get(self::NOISE_REDUCTION_APPLIED);
    }

    public static function ProfileName(): self
    {
        return self::get(self::PROFILE_NAME);
    }

    public static function ProfileHueSatMapDims(): self
    {
        return self::get(self::PROFILE_HUE_SAT_MAP_DIMS);
    }

    public static function ProfileHueSatMapData1(): self
    {
        return self::get(self::PROFILE_HUE_SAT_MAP_DATA_1);
    }

    public static function ProfileHueSatMapData2(): self
    {
        return self::get(self::PROFILE_HUE_SAT_MAP_DATA_2);
    }

    public static function ProfileToneCurve(): self
    {
        return self::get(self::PROFILE_TONE_CURVE);
    }

    public static function ProfileEmbedPolicy(): self
    {
        return self::get(self::PROFILE_EMBED_POLICY);
    }

    public static function ProfileCopyright(): self
    {
        return self::get(self::PROFILE_COPYRIGHT);
    }

    public static function ForwardMatrix1(): self
    {
        return self::get(self::FORWARD_MATRIX_1);
    }

    public static function ForwardMatrix2(): self
    {
        return self::get(self::FORWARD_MATRIX_2);
    }

    public static function PreviewApplicationName(): self
    {
        return self::get(self::PREVIEW_APPLICATION_NAME);
    }

    public static function PreviewApplicationVersion(): self
    {
        return self::get(self::PREVIEW_APPLICATION_VERSION);
    }

    public static function PreviewSettingsName(): self
    {
        return self::get(self::PREVIEW_SETTINGS_NAME);
    }

    public static function PreviewSettingsDigest(): self
    {
        return self::get(self::PREVIEW_SETTINGS_DIGEST);
    }

    public static function PreviewColorSpace(): self
    {
        return self::get(self::PREVIEW_COLOR_SPACE);
    }

    public static function PreviewDateTime(): self
    {
        return self::get(self::PREVIEW_DATE_TIME);
    }

    public static function RawImageDigest(): self
    {
        return self::get(self::RAW_IMAGE_DIGEST);
    }

    public static function OriginalRawFileDigest(): self
    {
        return self::get(self::ORIGINAL_RAW_FILE_DIGEST);
    }

    public static function SubTileBlockSize(): self
    {
        return self::get(self::SUB_TILE_BLOCK_SIZE);
    }

    public static function RowInterleaveFactor(): self
    {
        return self::get(self::ROW_INTERLEAVE_FACTOR);
    }

    public static function ProfileLookTableDims(): self
    {
        return self::get(self::PROFILE_LOOK_TABLE_DIMS);
    }

    public static function ProfileLookTableData(): self
    {
        return self::get(self::PROFILE_LOOK_TABLE_DATA);
    }

    public static function OpcodeList1(): self
    {
        return self::get(self::OPCODE_LIST_1);
    }

    public static function OpcodeList2(): self
    {
        return self::get(self::OPCODE_LIST_2);
    }

    public static function OpcodeList3(): self
    {
        return self::get(self::OPCODE_LIST_3);
    }

    public static function NoiseProfile(): self
    {
        return self::get(self::NOISE_PROFILE);
    }

    public static function TimeCodes(): self
    {
        return self::get(self::TIME_CODES);
    }

    public static function FrameRate(): self
    {
        return self::get(self::FRAME_RATE);
    }

    public static function TStop(): self
    {
        return self::get(self::T_STOP);
    }

    public static function ReelName(): self
    {
        return self::get(self::REEL_NAME);
    }

    public static function CameraLabel(): self
    {
        return self::get(self::CAMERA_LABEL);
    }

    public static function OriginalDefaultFinalSize(): self
    {
        return self::get(self::ORIGINAL_DEFAULT_FINAL_SIZE);
    }

    public static function OriginalBestQualityFinalSize(): self
    {
        return self::get(self::ORIGINAL_BEST_QUALITY_FINAL_SIZE);
    }

    public static function OriginalDefaultCropSize(): self
    {
        return self::get(self::ORIGINAL_DEFAULT_CROP_SIZE);
    }

    public static function ProfileHueSatMapEncoding(): self
    {
        return self::get(self::PROFILE_HUE_SAT_MAP_ENCODING);
    }

    public static function ProfileLookTableEncoding(): self
    {
        return self::get(self::PROFILE_LOOK_TABLE_ENCODING);
    }

    public static function BaselineExposureOffset(): self
    {
        return self::get(self::BASELINE_EXPOSURE_OFFSET);
    }

    public static function DefaultBlackRender(): self
    {
        return self::get(self::DEFAULT_BLACK_RENDER);
    }

    public static function NewRawImageDigest(): self
    {
        return self::get(self::NEW_RAW_IMAGE_DIGEST);
    }

    public static function RawToPreviewGain(): self
    {
        return self::get(self::RAW_TO_PREVIEW_GAIN);
    }

    public static function DefaultUserCrop(): self
    {
        return self::get(self::DEFAULT_USER_CROP);
    }

    public static function DepthFormat(): self
    {
        return self::get(self::DEPTH_FORMAT);
    }

    public static function DepthNear(): self
    {
        return self::get(self::DEPTH_NEAR);
    }

    public static function DepthFar(): self
    {
        return self::get(self::DEPTH_FAR);
    }

    public static function DepthUnits(): self
    {
        return self::get(self::DEPTH_UNITS);
    }

    public static function DepthMeasureType(): self
    {
        return self::get(self::DEPTH_MEASURE_TYPE);
    }

    public static function EnhanceParams(): self
    {
        return self::get(self::ENHANCE_PARAMS);
    }

    public static function ProfileGainTableMap(): self
    {
        return self::get(self::PROFILE_GAIN_TABLE_MAP);
    }

    public static function SemanticName(): self
    {
        return self::get(self::SEMANTIC_NAME);
    }

    public static function SemanticInstanceID(): self
    {
        return self::get(self::SEMANTIC_INSTANCE_ID);
    }

    public static function CalibrationIlluminant3(): self
    {
        return self::get(self::CALIBRATION_ILLUMINANT_3);
    }

    public static function CameraCalibration3(): self
    {
        return self::get(self::CAMERA_CALIBRATION_3);
    }

    public static function ColorMatrix3(): self
    {
        return self::get(self::COLOR_MATRIX_3);
    }

    public static function ForwardMatrix3(): self
    {
        return self::get(self::FORWARD_MATRIX_3);
    }

    public static function IlluminantData1(): self
    {
        return self::get(self::ILLUMINANT_DATA_1);
    }

    public static function IlluminantData2(): self
    {
        return self::get(self::ILLUMINANT_DATA_2);
    }

    public static function IlluminantData3(): self
    {
        return self::get(self::ILLUMINANT_DATA_3);
    }

    public static function MaskSubArea(): self
    {
        return self::get(self::MASK_SUB_AREA);
    }

    public static function ProfileHueSatMapData3(): self
    {
        return self::get(self::PROFILE_HUE_SAT_MAP_DATA_3);
    }

    public static function ReductionMatrix3(): self
    {
        return self::get(self::REDUCTION_MATRIX_3);
    }

    public static function RGBTables(): self
    {
        return self::get(self::RGB_TABLES);
    }

    public static function fromString(string $value): self
    {
        return self::get($value);
    }
}
