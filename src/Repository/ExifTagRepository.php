<?php declare(strict_types=1);

namespace App\Repository;

use App\DTO\ExifTag;
use App\Enum\ExifGPSInfo;
use App\Enum\ExifImage;
use App\Enum\ExifIop;
use App\Enum\ExifPhoto;
use App\Enum\ExifType;

class ExifTagRepository
{
    private array $data;

    public function __construct()
    {
        $this->data = [
            new ExifTag(
                11,
                ExifImage::ProcessingSoftware(),
                ExifType::Ascii(),
                'The name and version of the software used to post-process the picture.'
            ),
            new ExifTag(
                254,
                ExifImage::NewSubfileType(),
                ExifType::Long(),
                'A general indication of the kind of data contained in this subfile.'
            ),
            new ExifTag(
                255,
                ExifImage::SubfileType(),
                ExifType::Short(),
                'A general indication of the kind of data contained in this subfile. This field is deprecated. The NewSubfileType field should be used instead.'
            ),
            new ExifTag(
                256,
                ExifImage::ImageWidth(),
                ExifType::Long(),
                'The number of columns of image data, equal to the number of pixels per row. In JPEG compressed data a JPEG marker is used instead of this tag.'
            ),
            new ExifTag(
                257,
                ExifImage::ImageLength(),
                ExifType::Long(),
                'The number of rows of image data. In JPEG compressed data a JPEG marker is used instead of this tag.'
            ),
            new ExifTag(
                258,
                ExifImage::BitsPerSample(),
                ExifType::Short(),
                'The number of bits per image component. In this standard each component of the image is 8 bits, so the value for this tag is 8. See also <SamplesPerPixel>. In JPEG compressed data a JPEG marker is used instead of this tag.'
            ),
            new ExifTag(
                259,
                ExifImage::Compression(),
                ExifType::Short(),
                'The compression scheme used for the image data. When a primary image is JPEG compressed, this designation is not necessary and is omitted. When thumbnails use JPEG compression, this tag value is set to 6.'
            ),
            new ExifTag(
                262,
                ExifImage::PhotometricInterpretation(),
                ExifType::Short(),
                'The pixel composition. In JPEG compressed data a JPEG marker is used instead of this tag.'
            ),
            new ExifTag(
                263,
                ExifImage::Thresholding(),
                ExifType::Short(),
                'For black and white TIFF files that represent shades of gray, the technique used to convert from gray to black and white pixels.'
            ),
            new ExifTag(
                264,
                ExifImage::CellWidth(),
                ExifType::Short(),
                'The width of the dithering or halftoning matrix used to create a dithered or halftoned bilevel file.'
            ),
            new ExifTag(
                265,
                ExifImage::CellLength(),
                ExifType::Short(),
                'The length of the dithering or halftoning matrix used to create a dithered or halftoned bilevel file.'
            ),
            new ExifTag(266, ExifImage::FillOrder(), ExifType::Short(), 'The logical order of bits within a byte'),
            new ExifTag(
                269,
                ExifImage::DocumentName(),
                ExifType::Ascii(),
                'The name of the document from which this image was scanned.'
            ),
            new ExifTag(
                270,
                ExifImage::ImageDescription(),
                ExifType::Ascii(),
                'A character string giving the title of the image. It may be a comment such as "1988 company picnic" or the like. Two-bytes character codes cannot be used. When a 2-bytes code is necessary, the Exif Private tag <UserComment> is to be used.'
            ),
            new ExifTag(
                271,
                ExifImage::Make(),
                ExifType::Ascii(),
                'The manufacturer of the recording equipment. This is the manufacturer of the DSC, scanner, video digitizer or other equipment that generated the image. When the field is left blank, it is treated as unknown.'
            ),
            new ExifTag(
                272,
                ExifImage::Model(),
                ExifType::Ascii(),
                'The model name or model number of the equipment. This is the model name or number of the DSC, scanner, video digitizer or other equipment that generated the image. When the field is left blank, it is treated as unknown.'
            ),
            new ExifTag(
                273,
                ExifImage::StripOffsets(),
                ExifType::Long(),
                'For each strip, the byte offset of that strip. It is recommended that this be selected so the number of strip bytes does not exceed 64 Kbytes. With JPEG compressed data this designation is not needed and is omitted. See also <RowsPerStrip> and <StripByteCounts>.'
            ),
            new ExifTag(
                274,
                ExifImage::Orientation(),
                ExifType::Short(),
                'The image orientation viewed in terms of rows and columns.'
            ),
            new ExifTag(
                277,
                ExifImage::SamplesPerPixel(),
                ExifType::Short(),
                'The number of components per pixel. Since this standard applies to RGB and YCbCr images, the value set for this tag is 3. In JPEG compressed data a JPEG marker is used instead of this tag.'
            ),
            new ExifTag(
                278,
                ExifImage::RowsPerStrip(),
                ExifType::Long(),
                'The number of rows per strip. This is the number of rows in the image of one strip when an image is divided into strips. With JPEG compressed data this designation is not needed and is omitted. See also <StripOffsets> and <StripByteCounts>.'
            ),
            new ExifTag(
                279,
                ExifImage::StripByteCounts(),
                ExifType::Long(),
                'The total number of bytes in each strip. With JPEG compressed data this designation is not needed and is omitted.'
            ),
            new ExifTag(
                282,
                ExifImage::XResolution(),
                ExifType::Rational(),
                'The number of pixels per <ResolutionUnit> in the <ImageWidth> direction. When the image resolution is unknown, 72 [dpi] is designated.'
            ),
            new ExifTag(
                283,
                ExifImage::YResolution(),
                ExifType::Rational(),
                'The number of pixels per <ResolutionUnit> in the <ImageLength> direction. The same value as <XResolution> is designated.'
            ),
            new ExifTag(
                284,
                ExifImage::PlanarConfiguration(),
                ExifType::Short(),
                'Indicates whether pixel components are recorded in a chunky or planar format. In JPEG compressed files a JPEG marker is used instead of this tag. If this field does not exist, the TIFF default of 1 (chunky) is assumed.'
            ),
            new ExifTag(
                285,
                ExifImage::PageName(),
                ExifType::Ascii(),
                'The name of the page from which this image was scanned.'
            ),
            new ExifTag(
                286,
                ExifImage::XPosition(),
                ExifType::Rational(),
                'X position of the image. The X offset in ResolutionUnits of the left side of the image, with respect to the left side of the page.'
            ),
            new ExifTag(
                287,
                ExifImage::YPosition(),
                ExifType::Rational(),
                'Y position of the image. The Y offset in ResolutionUnits of the top of the image, with respect to the top of the page. In the TIFF coordinate scheme, the positive Y direction is down, so that YPosition is always positive.'
            ),
            new ExifTag(
                290,
                ExifImage::GrayResponseUnit(),
                ExifType::Short(),
                'The precision of the information contained in the GrayResponseCurve.'
            ),
            new ExifTag(
                291,
                ExifImage::GrayResponseCurve(),
                ExifType::Short(),
                'For grayscale data, the optical density of each possible pixel value.'
            ),
            new ExifTag(292, ExifImage::T4Options(), ExifType::Long(), 'T.4-encoding options.'),
            new ExifTag(293, ExifImage::T6Options(), ExifType::Long(), 'T.6-encoding options.'),
            new ExifTag(
                296,
                ExifImage::ResolutionUnit(),
                ExifType::Short(),
                'The unit for measuring <XResolution> and <YResolution>. The same unit is used for both <XResolution> and <YResolution>. If the image resolution is unknown, 2 (inches) is designated.'
            ),
            new ExifTag(
                297,
                ExifImage::PageNumber(),
                ExifType::Short(),
                'The page number of the page from which this image was scanned.'
            ),
            new ExifTag(
                301,
                ExifImage::TransferFunction(),
                ExifType::Short(),
                'A transfer function for the image, described in tabular style. Normally this tag is not necessary, since color space is specified in the color space information tag (<ColorSpace>).'
            ),
            new ExifTag(
                305,
                ExifImage::Software(),
                ExifType::Ascii(),
                'This tag records the name and version of the software or firmware of the camera or image input device used to generate the image. The detailed format is not specified, but it is recommended that the example shown below be followed. When the field is left blank, it is treated as unknown.'
            ),
            new ExifTag(
                306,
                ExifImage::DateTime(),
                ExifType::Ascii(),
                'The date and time of image creation. In Exif standard, it is the date and time the file was changed.'
            ),
            new ExifTag(
                315,
                ExifImage::Artist(),
                ExifType::Ascii(),
                'This tag records the name of the camera owner, photographer or image creator. The detailed format is not specified, but it is recommended that the information be written as in the example below for ease of Interoperability. When the field is left blank, it is treated as unknown. Ex.) "Camera owner, John Smith; Photographer, Michael Brown; Image creator, Ken James"'
            ),
            new ExifTag(
                316,
                ExifImage::HostComputer(),
                ExifType::Ascii(),
                'This tag records information about the host computer used to generate the image.'
            ),
            new ExifTag(
                317,
                ExifImage::Predictor(),
                ExifType::Short(),
                'A predictor is a mathematical operator that is applied to the image data before an encoding scheme is applied.'
            ),
            new ExifTag(
                318,
                ExifImage::WhitePoint(),
                ExifType::Rational(),
                'The chromaticity of the white point of the image. Normally this tag is not necessary, since color space is specified in the colorspace information tag (<ColorSpace>).'
            ),
            new ExifTag(
                319,
                ExifImage::PrimaryChromaticities(),
                ExifType::Rational(),
                'The chromaticity of the three primary colors of the image. Normally this tag is not necessary, since colorspace is specified in the colorspace information tag (<ColorSpace>).'
            ),
            new ExifTag(
                320,
                ExifImage::ColorMap(),
                ExifType::Short(),
                'A color map for palette color images. This field defines a Red-Green-Blue color map (often called a lookup table) for palette-color images. In a palette-color image, a pixel value is used to index into an RGB lookup table.'
            ),
            new ExifTag(
                321,
                ExifImage::HalftoneHints(),
                ExifType::Short(),
                'The purpose of the HalftoneHints field is to convey to the halftone function the range of gray levels within a colorimetrically-specified image that should retain tonal detail.'
            ),
            new ExifTag(
                322,
                ExifImage::TileWidth(),
                ExifType::Long(),
                'The tile width in pixels. This is the number of columns in each tile.'
            ),
            new ExifTag(
                323,
                ExifImage::TileLength(),
                ExifType::Long(),
                'The tile length (height) in pixels. This is the number of rows in each tile.'
            ),
            new ExifTag(
                324,
                ExifImage::TileOffsets(),
                ExifType::Short(),
                'For each tile, the byte offset of that tile, as compressed and stored on disk. The offset is specified with respect to the beginning of the TIFF file. Note that this implies that each tile has a location independent of the locations of other tiles.'
            ),
            new ExifTag(
                325,
                ExifImage::TileByteCounts(),
                ExifType::Long(),
                'For each tile, the number of (compressed) bytes in that tile. See TileOffsets for a description of how the byte counts are ordered.'
            ),
            new ExifTag(
                330,
                ExifImage::SubIFDs(),
                ExifType::Long(),
                'Defined by Adobe Corporation to enable TIFF Trees within a TIFF file.'
            ),
            new ExifTag(
                332,
                ExifImage::InkSet(),
                ExifType::Short(),
                'The set of inks used in a separated (PhotometricInterpretation=5) image.'
            ),
            new ExifTag(
                333,
                ExifImage::InkNames(),
                ExifType::Ascii(),
                'The name of each ink used in a separated (PhotometricInterpretation=5) image.'
            ),
            new ExifTag(
                334,
                ExifImage::NumberOfInks(),
                ExifType::Short(),
                'The number of inks. Usually equal to SamplesPerPixel, unless there are extra samples.'
            ),
            new ExifTag(
                336,
                ExifImage::DotRange(),
                ExifType::Byte(),
                'The component values that correspond to a 0% dot and 100% dot.'
            ),
            new ExifTag(
                337,
                ExifImage::TargetPrinter(),
                ExifType::Ascii(),
                'A description of the printing environment for which this separation is intended.'
            ),
            new ExifTag(
                338,
                ExifImage::ExtraSamples(),
                ExifType::Short(),
                'Specifies that each pixel has m extra components whose interpretation is defined by one of the values listed below.'
            ),
            new ExifTag(
                339,
                ExifImage::SampleFormat(),
                ExifType::Short(),
                'This field specifies how to interpret each data sample in a pixel.'
            ),
            new ExifTag(
                340,
                ExifImage::SMinSampleValue(),
                ExifType::Short(),
                'This field specifies the minimum sample value.'
            ),
            new ExifTag(
                341,
                ExifImage::SMaxSampleValue(),
                ExifType::Short(),
                'This field specifies the maximum sample value.'
            ),
            new ExifTag(
                342, ExifImage::TransferRange(), ExifType::Short(), 'Expands the range of the TransferFunction'
            ),
            new ExifTag(
                343,
                ExifImage::ClipPath(),
                ExifType::Byte(),
                'A TIFF ClipPath is intended to mirror the essentials of PostScript\'s path creation functionality.'
            ),
            new ExifTag(
                344,
                ExifImage::XClipPathUnits(),
                ExifType::SShort(),
                'The number of units that span the width of the image, in terms of integer ClipPath coordinates.'
            ),
            new ExifTag(
                345,
                ExifImage::YClipPathUnits(),
                ExifType::SShort(),
                'The number of units that span the height of the image, in terms of integer ClipPath coordinates.'
            ),
            new ExifTag(
                346,
                ExifImage::Indexed(),
                ExifType::Short(),
                'Indexed images are images where the \'pixels\' do not represent color values, but rather an index (usually 8-bit) into a separate color table, the ColorMap.'
            ),
            new ExifTag(
                347,
                ExifImage::JPEGTables(),
                ExifType::Undefined(),
                'This optional tag may be used to encode the JPEG quantization and Huffman tables for subsequent use by the JPEG decompression process.'
            ),
            new ExifTag(
                351,
                ExifImage::OPIProxy(),
                ExifType::Short(),
                'OPIProxy gives information concerning whether this image is a low-resolution proxy of a high-resolution image (Adobe OPI).'
            ),
            new ExifTag(
                512,
                ExifImage::JPEGProc(),
                ExifType::Long(),
                'This field indicates the process used to produce the compressed data'
            ),
            new ExifTag(
                513,
                ExifImage::JPEGInterchangeFormat(),
                ExifType::Long(),
                'The offset to the start byte (SOI) of JPEG compressed thumbnail data. This is not used for primary image JPEG data.'
            ),
            new ExifTag(
                514,
                ExifImage::JPEGInterchangeFormatLength(),
                ExifType::Long(),
                'The number of bytes of JPEG compressed thumbnail data. This is not used for primary image JPEG data. JPEG thumbnails are not divided but are recorded as a continuous JPEG bitstream from SOI to EOI. Appn and COM markers should not be recorded. Compressed thumbnails must be recorded in no more than 64 Kbytes, including all other data to be recorded in APP1.'
            ),
            new ExifTag(
                515,
                ExifImage::JPEGRestartInterval(),
                ExifType::Short(),
                'This Field indicates the length of the restart interval used in the compressed image data.'
            ),
            new ExifTag(
                517,
                ExifImage::JPEGLosslessPredictors(),
                ExifType::Short(),
                'This Field points to a list of lossless predictor-selection values, one per component.'
            ),
            new ExifTag(
                518,
                ExifImage::JPEGPointTransforms(),
                ExifType::Short(),
                'This Field points to a list of point transform values, one per component.'
            ),
            new ExifTag(
                519,
                ExifImage::JPEGQTables(),
                ExifType::Long(),
                'This Field points to a list of offsets to the quantization tables, one per component.'
            ),
            new ExifTag(
                520,
                ExifImage::JPEGDCTables(),
                ExifType::Long(),
                'This Field points to a list of offsets to the DC Huffman tables or the lossless Huffman tables, one per component.'
            ),
            new ExifTag(
                521,
                ExifImage::JPEGACTables(),
                ExifType::Long(),
                'This Field points to a list of offsets to the Huffman AC tables, one per component.'
            ),
            new ExifTag(
                529,
                ExifImage::YCbCrCoefficients(),
                ExifType::Rational(),
                'The matrix coefficients for transformation from RGB to YCbCr image data. No default is given in TIFF; but here the value given in Appendix E, "Color Space Guidelines", is used as the default. The color space is declared in a color space information tag, with the default being the value that gives the optimal image characteristics Interoperability this condition.'
            ),
            new ExifTag(
                530,
                ExifImage::YCbCrSubSampling(),
                ExifType::Short(),
                'The sampling ratio of chrominance components in relation to the luminance component. In JPEG compressed data a JPEG marker is used instead of this tag.'
            ),
            new ExifTag(
                531,
                ExifImage::YCbCrPositioning(),
                ExifType::Short(),
                'The position of chrominance components in relation to the luminance component. This field is designated only for JPEG compressed data or uncompressed YCbCr data. The TIFF default is 1 (centered); but when Y:Cb:Cr = 4:2:2 it is recommended in this standard that 2 (co-sited) be used to record data, in order to improve the image quality when viewed on TV systems. When this field does not exist, the reader shall assume the TIFF default. In the case of Y:Cb:Cr = 4:2:0, the TIFF default (centered) is recommended. If the reader does not have the capability of supporting both kinds of <YCbCrPositioning>, it shall follow the TIFF default regardless of the value in this field. It is preferable that readers be able to support both centered and co-sited positioning.'
            ),
            new ExifTag(
                532,
                ExifImage::ReferenceBlackWhite(),
                ExifType::Rational(),
                'The reference black point value and reference white point value. No defaults are given in TIFF, but the values below are given as defaults here. The color space is declared in a color space information tag, with the default being the value that gives the optimal image characteristics Interoperability these conditions.'
            ),
            new ExifTag(700, ExifImage::XMLPacket(), ExifType::Byte(), 'XMP Metadata (Adobe technote 9-14-02)'),
            new ExifTag(18246, ExifImage::Rating(), ExifType::Short(), 'Rating tag used by Windows'),
            new ExifTag(
                18249,
                ExifImage::RatingPercent(),
                ExifType::Short(),
                'Rating tag used by Windows, value in percent'
            ),
            new ExifTag(
                28722,
                ExifImage::VignettingCorrParams(),
                ExifType::SShort(),
                'Sony vignetting correction parameters'
            ),
            new ExifTag(
                28725,
                ExifImage::ChromaticAberrationCorrParams(),
                ExifType::SShort(),
                'Sony chromatic aberration correction parameters'
            ),
            new ExifTag(
                28727,
                ExifImage::DistortionCorrParams(),
                ExifType::SShort(),
                'Sony distortion correction parameters'
            ),
            new ExifTag(
                32781,
                ExifImage::ImageID(),
                ExifType::Ascii(),
                'ImageID is the full pathname of the original, high-resolution image, or any other identifying string that uniquely identifies the original image (Adobe OPI).'
            ),
            new ExifTag(
                33421,
                ExifImage::CFARepeatPatternDim(),
                ExifType::Short(),
                'Contains two values representing the minimum rows and columns to define the repeating patterns of the color filter array'
            ),
            new ExifTag(
                33422,
                ExifImage::CFAPattern(),
                ExifType::Byte(),
                'Indicates the color filter array (CFA) geometric pattern of the image sensor when a one-chip color area sensor is used. It does not apply to all sensing methods'
            ),
            new ExifTag(
                33423,
                ExifImage::BatteryLevel(),
                ExifType::Rational(),
                'Contains a value of the battery level as a fraction or string'
            ),
            new ExifTag(
                33432,
                ExifImage::Copyright(),
                ExifType::Ascii(),
                'Copyright information. In this standard the tag is used to indicate both the photographer and editor copyrights. It is the copyright notice of the person or organization claiming rights to the image. The Interoperability copyright statement including date and rights should be written in this field; e.g., "Copyright, John Smith, 19xx. All rights reserved.". In this standard the field records both the photographer and editor copyrights, with each recorded in a separate part of the statement. When there is a clear distinction between the photographer and editor copyrights, these are to be written in the order of photographer followed by editor copyright, separated by NULL (in this case since the statement also ends with a NULL, there are two NULL codes). When only the photographer copyright is given, it is terminated by one NULL code. When only the editor copyright is given, the photographer copyright part consists of one space followed by a terminating NULL code, then the editor copyright is given. When the field is left blank, it is treated as unknown.'
            ),
            new ExifTag(33434, ExifImage::ExposureTime(), ExifType::Rational(), 'Exposure time, given in seconds.'),
            new ExifTag(33437, ExifImage::FNumber(), ExifType::Rational(), 'The F number.'),
            new ExifTag(33723, ExifImage::IPTCNAA(), ExifType::Long(), 'Contains an IPTC/NAA record'),
            new ExifTag(
                34377,
                ExifImage::ImageResources(),
                ExifType::Byte(),
                'Contains information embedded by the Adobe Photoshop application'
            ),
            new ExifTag(
                34665,
                ExifImage::ExifTag(),
                ExifType::Long(),
                'A pointer to the Exif IFD. Interoperability, Exif IFD has the same structure as that of the IFD specified in TIFF. ordinarily, however, it does not contain image data as in the case of TIFF.'
            ),
            new ExifTag(
                34675,
                ExifImage::InterColorProfile(),
                ExifType::Undefined(),
                'Contains an InterColor Consortium (ICC) format color space characterization/profile'
            ),
            new ExifTag(
                34850,
                ExifImage::ExposureProgram(),
                ExifType::Short(),
                'The class of the program used by the camera to set exposure when the picture is taken.'
            ),
            new ExifTag(
                34852,
                ExifImage::SpectralSensitivity(),
                ExifType::Ascii(),
                'Indicates the spectral sensitivity of each channel of the camera used.'
            ),
            new ExifTag(
                34853,
                ExifImage::GPSTag(),
                ExifType::Long(),
                'A pointer to the GPS Info IFD. The Interoperability structure of the GPS Info IFD, like that of Exif IFD, has no image data.'
            ),
            new ExifTag(
                34855,
                ExifImage::ISOSpeedRatings(),
                ExifType::Short(),
                'Indicates the ISO Speed and ISO Latitude of the camera or input device as specified in ISO 12232.'
            ),
            new ExifTag(
                34856,
                ExifImage::OECF(),
                ExifType::Undefined(),
                'Indicates the Opto-Electric Conversion Function (OECF) specified in ISO 14524.'
            ),
            new ExifTag(
                34857,
                ExifImage::Interlace(),
                ExifType::Short(),
                'Indicates the field number of multifield images.'
            ),
            new ExifTag(
                34858,
                ExifImage::TimeZoneOffset(),
                ExifType::SShort(),
                'This optional tag encodes the time zone of the camera clock (relative to Greenwich Mean Time) used to create the DataTimeOriginal tag-value when the picture was taken. It may also contain the time zone offset of the clock used to create the DateTime tag-value when the image was modified.'
            ),
            new ExifTag(
                34859,
                ExifImage::SelfTimerMode(),
                ExifType::Short(),
                'Number of seconds image capture was delayed from button press.'
            ),
            new ExifTag(
                36867,
                ExifImage::DateTimeOriginal(),
                ExifType::Ascii(),
                'The date and time when the original image data was generated.'
            ),
            new ExifTag(
                37122,
                ExifImage::CompressedBitsPerPixel(),
                ExifType::Rational(),
                'Specific to compressed data; states the compressed bits per pixel.'
            ),
            new ExifTag(37377, ExifImage::ShutterSpeedValue(), ExifType::SRational(), 'Shutter speed.'),
            new ExifTag(37378, ExifImage::ApertureValue(), ExifType::Rational(), 'The lens aperture.'),
            new ExifTag(37379, ExifImage::BrightnessValue(), ExifType::SRational(), 'The value of brightness.'),
            new ExifTag(37380, ExifImage::ExposureBiasValue(), ExifType::SRational(), 'The exposure bias.'),
            new ExifTag(
                37381, ExifImage::MaxApertureValue(), ExifType::Rational(), 'The smallest F number of the lens.'
            ),
            new ExifTag(
                37382,
                ExifImage::SubjectDistance(),
                ExifType::SRational(),
                'The distance to the subject, given in meters.'
            ),
            new ExifTag(37383, ExifImage::MeteringMode(), ExifType::Short(), 'The metering mode.'),
            new ExifTag(37384, ExifImage::LightSource(), ExifType::Short(), 'The kind of light source.'),
            new ExifTag(
                37385,
                ExifImage::Flash(),
                ExifType::Short(),
                'Indicates the status of flash when the image was shot.'
            ),
            new ExifTag(
                37386,
                ExifImage::FocalLength(),
                ExifType::Rational(),
                'The actual focal length of the lens, in mm.'
            ),
            new ExifTag(37387, ExifImage::FlashEnergy(), ExifType::Rational(), 'Amount of flash energy (BCPS).'),
            new ExifTag(37388, ExifImage::SpatialFrequencyResponse(), ExifType::Undefined(), 'SFR of the camera.'),
            new ExifTag(37389, ExifImage::Noise(), ExifType::Undefined(), 'Noise measurement values.'),
            new ExifTag(
                37390,
                ExifImage::FocalPlaneXResolution(),
                ExifType::Rational(),
                'Number of pixels per FocalPlaneResolutionUnit (37392) in ImageWidth direction for main image.'
            ),
            new ExifTag(
                37391,
                ExifImage::FocalPlaneYResolution(),
                ExifType::Rational(),
                'Number of pixels per FocalPlaneResolutionUnit (37392) in ImageLength direction for main image.'
            ),
            new ExifTag(
                37392,
                ExifImage::FocalPlaneResolutionUnit(),
                ExifType::Short(),
                'Unit of measurement for FocalPlaneXResolution(37390) and FocalPlaneYResolution(37391).'
            ),
            new ExifTag(
                37393,
                ExifImage::ImageNumber(),
                ExifType::Long(),
                'Number assigned to an image, e.g., in a chained image burst.'
            ),
            new ExifTag(
                37394,
                ExifImage::SecurityClassification(),
                ExifType::Ascii(),
                'Security classification assigned to the image.'
            ),
            new ExifTag(
                37395,
                ExifImage::ImageHistory(),
                ExifType::Ascii(),
                'Record of what has been done to the image.'
            ),
            new ExifTag(
                37396,
                ExifImage::SubjectLocation(),
                ExifType::Short(),
                'Indicates the location and area of the main subject in the overall scene.'
            ),
            new ExifTag(
                37397,
                ExifImage::ExposureIndex(),
                ExifType::Rational(),
                'Encodes the camera exposure index setting when image was captured.'
            ),
            new ExifTag(
                37398,
                ExifImage::TIFFEPStandardID(),
                ExifType::Byte(),
                'Contains four ASCII characters representing the TIFF/EP standard version of a TIFF/EP file, eg \'1\', \'0\', \'0\', \'0\''
            ),
            new ExifTag(37399, ExifImage::SensingMethod(), ExifType::Short(), 'Type of image sensor.'),
            new ExifTag(40091, ExifImage::XPTitle(), ExifType::Byte(), 'Title tag used by Windows, encoded in UCS2'),
            new ExifTag(
                40092, ExifImage::XPComment(), ExifType::Byte(), 'Comment tag used by Windows, encoded in UCS2'
            ),
            new ExifTag(40093, ExifImage::XPAuthor(), ExifType::Byte(), 'Author tag used by Windows, encoded in UCS2'),
            new ExifTag(
                40094,
                ExifImage::XPKeywords(),
                ExifType::Byte(),
                'Keywords tag used by Windows, encoded in UCS2'
            ),
            new ExifTag(
                40095, ExifImage::XPSubject(), ExifType::Byte(), 'Subject tag used by Windows, encoded in UCS2'
            ),
            new ExifTag(
                50341,
                ExifImage::PrintImageMatching(),
                ExifType::Undefined(),
                'Print Image Matching, description needed.'
            ),
            new ExifTag(
                50706,
                ExifImage::DNGVersion(),
                ExifType::Byte(),
                'This tag encodes the DNG four-tier version number. For files compliant with version 1.1.0.0 of the DNG specification, this tag should contain the bytes: 1, 1, 0, 0.'
            ),
            new ExifTag(
                50707,
                ExifImage::DNGBackwardVersion(),
                ExifType::Byte(),
                'This tag specifies the oldest version of the Digital Negative specification for which a file is compatible. Readers shouldnot attempt to read a file if this tag specifies a version number that is higher than the version number of the specification the reader was based on. In addition to checking the version tags, readers should, for all tags, check the types, counts, and values, to verify it is able to correctly read the file.'
            ),
            new ExifTag(
                50708,
                ExifImage::UniqueCameraModel(),
                ExifType::Ascii(),
                'Defines a unique, non-localized name for the camera model that created the image in the raw file. This name should include the manufacturer\'s name to avoid conflicts, and should not be localized, even if the camera name itself is localized for different markets (see LocalizedCameraModel). This string may be used by reader software to index into per-model preferences and replacement profiles.'
            ),
            new ExifTag(
                50709,
                ExifImage::LocalizedCameraModel(),
                ExifType::Byte(),
                'Similar to the UniqueCameraModel field, except the name can be localized for different markets to match the localization of the camera name.'
            ),
            new ExifTag(
                50710,
                ExifImage::CFAPlaneColor(),
                ExifType::Byte(),
                'Provides a mapping between the values in the CFAPattern tag and the plane numbers in LinearRaw space. This is a required tag for non-RGB CFA images.'
            ),
            new ExifTag(50711, ExifImage::CFALayout(), ExifType::Short(), 'Describes the spatial layout of the CFA.'),
            new ExifTag(
                50712,
                ExifImage::LinearizationTable(),
                ExifType::Short(),
                'Describes a lookup table that maps stored values into linear values. This tag is typically used to increase compression ratios by storing the raw data in a non-linear, more visually uniform space with fewer total encoding levels. If SamplesPerPixel is not equal to one, this single table applies to all the samples for each pixel.'
            ),
            new ExifTag(
                50713,
                ExifImage::BlackLevelRepeatDim(),
                ExifType::Short(),
                'Specifies repeat pattern size for the BlackLevel tag.'
            ),
            new ExifTag(
                50714,
                ExifImage::BlackLevel(),
                ExifType::Rational(),
                'Specifies the zero light (a.k.a. thermal black or black current) encoding level, as a repeating pattern. The origin of this pattern is the top-left corner of the ActiveArea rectangle. The values are stored in row-column-sample scan order.'
            ),
            new ExifTag(
                50715,
                ExifImage::BlackLevelDeltaH(),
                ExifType::SRational(),
                'If the zero light encoding level is a function of the image column, BlackLevelDeltaH specifies the difference between the zero light encoding level for each column and the baseline zero light encoding level. If SamplesPerPixel is not equal to one, this single table applies to all the samples for each pixel.'
            ),
            new ExifTag(
                50716,
                ExifImage::BlackLevelDeltaV(),
                ExifType::SRational(),
                'If the zero light encoding level is a function of the image row, this tag specifies the difference between the zero light encoding level for each row and the baseline zero light encoding level. If SamplesPerPixel is not equal to one, this single table applies to all the samples for each pixel.'
            ),
            new ExifTag(
                50717,
                ExifImage::WhiteLevel(),
                ExifType::Long(),
                'This tag specifies the fully saturated encoding level for the raw sample values. Saturation is caused either by the sensor itself becoming highly non-linear in response, or by the camera\'s analog to digital converter clipping.'
            ),
            new ExifTag(
                50718,
                ExifImage::DefaultScale(),
                ExifType::Rational(),
                'DefaultScale is required for cameras with non-square pixels. It specifies the default scale factors for each direction to convert the image to square pixels. Typically these factors are selected to approximately preserve total pixel count. For CFA images that use CFALayout equal to 2, 3, 4, or 5, such as the Fujifilm SuperCCD, these two values should usually differ by a factor of 2.0.'
            ),
            new ExifTag(
                50719,
                ExifImage::DefaultCropOrigin(),
                ExifType::Long(),
                'Raw images often store extra pixels around the edges of the final image. These extra pixels help prevent interpolation artifacts near the edges of the final image. DefaultCropOrigin specifies the origin of the final image area, in raw image coordinates (i.e., before the DefaultScale has been applied), relative to the top-left corner of the ActiveArea rectangle.'
            ),
            new ExifTag(
                50720,
                ExifImage::DefaultCropSize(),
                ExifType::Long(),
                'Raw images often store extra pixels around the edges of the final image. These extra pixels help prevent interpolation artifacts near the edges of the final image. DefaultCropSize specifies the size of the final image area, in raw image coordinates (i.e., before the DefaultScale has been applied).'
            ),
            new ExifTag(
                50721,
                ExifImage::ColorMatrix1(),
                ExifType::SRational(),
                'ColorMatrix1 defines a transformation matrix that converts XYZ values to reference camera native color space values, under the first calibration illuminant. The matrix values are stored in row scan order. The ColorMatrix1 tag is required for all non-monochrome DNG files.'
            ),
            new ExifTag(
                50722,
                ExifImage::ColorMatrix2(),
                ExifType::SRational(),
                'ColorMatrix2 defines a transformation matrix that converts XYZ values to reference camera native color space values, under the second calibration illuminant. The matrix values are stored in row scan order.'
            ),
            new ExifTag(
                50723,
                ExifImage::CameraCalibration1(),
                ExifType::SRational(),
                'CameraCalibration1 defines a calibration matrix that transforms reference camera native space values to individual camera native space values under the first calibration illuminant. The matrix is stored in row scan order. This matrix is stored separately from the matrix specified by the ColorMatrix1 tag to allow raw converters to swap in replacement color matrices based on UniqueCameraModel tag, while still taking advantage of any per-individual camera calibration performed by the camera manufacturer.'
            ),
            new ExifTag(
                50724,
                ExifImage::CameraCalibration2(),
                ExifType::SRational(),
                'CameraCalibration2 defines a calibration matrix that transforms reference camera native space values to individual camera native space values under the second calibration illuminant. The matrix is stored in row scan order. This matrix is stored separately from the matrix specified by the ColorMatrix2 tag to allow raw converters to swap in replacement color matrices based on UniqueCameraModel tag, while still taking advantage of any per-individual camera calibration performed by the camera manufacturer.'
            ),
            new ExifTag(
                50725,
                ExifImage::ReductionMatrix1(),
                ExifType::SRational(),
                'ReductionMatrix1 defines a dimensionality reduction matrix for use as the first stage in converting color camera native space values to XYZ values, under the first calibration illuminant. This tag may only be used if ColorPlanes is greater than 3. The matrix is stored in row scan order.'
            ),
            new ExifTag(
                50726,
                ExifImage::ReductionMatrix2(),
                ExifType::SRational(),
                'ReductionMatrix2 defines a dimensionality reduction matrix for use as the first stage in converting color camera native space values to XYZ values, under the second calibration illuminant. This tag may only be used if ColorPlanes is greater than 3. The matrix is stored in row scan order.'
            ),
            new ExifTag(
                50727,
                ExifImage::AnalogBalance(),
                ExifType::Rational(),
                'Normally the stored raw values are not white balanced, since any digital white balancing will reduce the dynamic range of the final image if the user decides to later adjust the white balance; however, if camera hardware is capable of white balancing the color channels before the signal is digitized, it can improve the dynamic range of the final image. AnalogBalance defines the gain, either analog (recommended) or digital (not recommended) that has been applied the stored raw values.'
            ),
            new ExifTag(
                50728,
                ExifImage::AsShotNeutral(),
                ExifType::Short(),
                'Specifies the selected white balance at time of capture, encoded as the coordinates of a perfectly neutral color in linear reference space values. The inclusion of this tag precludes the inclusion of the AsShotWhiteXY tag.'
            ),
            new ExifTag(
                50729,
                ExifImage::AsShotWhiteXY(),
                ExifType::Rational(),
                'Specifies the selected white balance at time of capture, encoded as x-y chromaticity coordinates. The inclusion of this tag precludes the inclusion of the AsShotNeutral tag.'
            ),
            new ExifTag(
                50730,
                ExifImage::BaselineExposure(),
                ExifType::SRational(),
                'Camera models vary in the trade-off they make between highlight headroom and shadow noise. Some leave a significant amount of highlight headroom during a normal exposure. This allows significant negative exposure compensation to be applied during raw conversion, but also means normal exposures will contain more shadow noise. Other models leave less headroom during normal exposures. This allows for less negative exposure compensation, but results in lower shadow noise for normal exposures. Because of these differences, a raw converter needs to vary the zero point of its exposure compensation control from model to model. BaselineExposure specifies by how much (in EV units) to move the zero point. Positive values result in brighter default results, while negative values result in darker default results.'
            ),
            new ExifTag(
                50731,
                ExifImage::BaselineNoise(),
                ExifType::Rational(),
                'Specifies the relative noise level of the camera model at a baseline ISO value of 100, compared to a reference camera model. Since noise levels tend to vary approximately with the square root of the ISO value, a raw converter can use this value, combined with the current ISO, to estimate the relative noise level of the current image.'
            ),
            new ExifTag(
                50732,
                ExifImage::BaselineSharpness(),
                ExifType::Rational(),
                'Specifies the relative amount of sharpening required for this camera model, compared to a reference camera model. Camera models vary in the strengths of their anti-aliasing filters. Cameras with weak or no filters require less sharpening than cameras with strong anti-aliasing filters.'
            ),
            new ExifTag(
                50733,
                ExifImage::BayerGreenSplit(),
                ExifType::Long(),
                'Only applies to CFA images using a Bayer pattern filter array. This tag specifies, in arbitrary units, how closely the values of the green pixels in the blue/green rows track the values of the green pixels in the red/green rows. A value of zero means the two kinds of green pixels track closely, while a non-zero value means they sometimes diverge. The useful range for this tag is from 0 (no divergence) to about 5000 (quite large divergence).'
            ),
            new ExifTag(
                50734,
                ExifImage::LinearResponseLimit(),
                ExifType::Rational(),
                'Some sensors have an unpredictable non-linearity in their response as they near the upper limit of their encoding range. This non-linearity results in color shifts in the highlight areas of the resulting image unless the raw converter compensates for this effect. LinearResponseLimit specifies the fraction of the encoding range above which the response may become significantly non-linear.'
            ),
            new ExifTag(
                50735,
                ExifImage::CameraSerialNumber(),
                ExifType::Ascii(),
                'CameraSerialNumber contains the serial number of the camera or camera body that captured the image.'
            ),
            new ExifTag(
                50736,
                ExifImage::LensInfo(),
                ExifType::Rational(),
                'Contains information about the lens that captured the image. If the minimum f-stops are unknown, they should be encoded as 0/0.'
            ),
            new ExifTag(
                50737,
                ExifImage::ChromaBlurRadius(),
                ExifType::Rational(),
                'ChromaBlurRadius provides a hint to the DNG reader about how much chroma blur should be applied to the image. If this tag is omitted, the reader will use its default amount of chroma blurring. Normally this tag is only included for non-CFA images, since the amount of chroma blur required for mosaic images is highly dependent on the de-mosaic algorithm, in which case the DNG reader\'s default value is likely optimized for its particular de-mosaic algorithm.'
            ),
            new ExifTag(
                50738,
                ExifImage::AntiAliasStrength(),
                ExifType::Rational(),
                'Provides a hint to the DNG reader about how strong the camera\'s anti-alias filter is. A value of 0.0 means no anti-alias filter (i.e., the camera is prone to aliasing artifacts with some subjects), while a value of 1.0 means a strong anti-alias filter (i.e., the camera almost never has aliasing artifacts).'
            ),
            new ExifTag(
                50739,
                ExifImage::ShadowScale(),
                ExifType::SRational(),
                'This tag is used by Adobe Camera Raw to control the sensitivity of its \'Shadows\' slider.'
            ),
            new ExifTag(
                50740,
                ExifImage::DNGPrivateData(),
                ExifType::Byte(),
                'Provides a way for camera manufacturers to store private data in the DNG file for use by their own raw converters, and to have that data preserved by programs that edit DNG files.'
            ),
            new ExifTag(
                50741,
                ExifImage::MakerNoteSafety(),
                ExifType::Short(),
                'MakerNoteSafety lets the DNG reader know whether the EXIF MakerNote tag is safe to preserve along with the rest of the EXIF data. File browsers and other image management software processing an image with a preserved MakerNote should be aware that any thumbnail image embedded in the MakerNote may be stale, and may not reflect the current state of the full size image.'
            ),
            new ExifTag(
                50778,
                ExifImage::CalibrationIlluminant1(),
                ExifType::Short(),
                'The illuminant used for the first set of color calibration tags (ColorMatrix1, CameraCalibration1, ReductionMatrix1). The legal values for this tag are the same as the legal values for the LightSource EXIF tag. If set to 255 (Other), then the IFD must also include a IlluminantData1 tag to specify the x-y chromaticity or spectral power distribution function for this illuminant.'
            ),
            new ExifTag(
                50779,
                ExifImage::CalibrationIlluminant2(),
                ExifType::Short(),
                'The illuminant used for an optional second set of color calibration tags (ColorMatrix2, CameraCalibration2, ReductionMatrix2). The legal values for this tag are the same as the legal values for the CalibrationIlluminant1 tag; however, if both are included, neither is allowed to have a value of 0 (unknown). If set to 255 (Other), then the IFD must also include a IlluminantData2 tag to specify the x-y chromaticity or spectral power distribution function for this illuminant.'
            ),
            new ExifTag(
                50780,
                ExifImage::BestQualityScale(),
                ExifType::Rational(),
                'For some cameras, the best possible image quality is not achieved by preserving the total pixel count during conversion. For example, Fujifilm SuperCCD images have maximum detail when their total pixel count is doubled. This tag specifies the amount by which the values of the DefaultScale tag need to be multiplied to achieve the best quality image size.'
            ),
            new ExifTag(
                50781,
                ExifImage::RawDataUniqueID(),
                ExifType::Byte(),
                'This tag contains a 16-byte unique identifier for the raw image data in the DNG file. DNG readers can use this tag to recognize a particular raw image, even if the file\'s name or the metadata contained in the file has been changed. If a DNG writer creates such an identifier, it should do so using an algorithm that will ensure that it is very unlikely two different images will end up having the same identifier.'
            ),
            new ExifTag(
                50827,
                ExifImage::OriginalRawFileName(),
                ExifType::Byte(),
                'If the DNG file was converted from a non-DNG raw file, then this tag contains the file name of that original raw file.'
            ),
            new ExifTag(
                50828,
                ExifImage::OriginalRawFileData(),
                ExifType::Undefined(),
                'If the DNG file was converted from a non-DNG raw file, then this tag contains the compressed contents of that original raw file. The contents of this tag always use the big-endian byte order. The tag contains a sequence of data blocks. Future versions of the DNG specification may define additional data blocks, so DNG readers should ignore extra bytes when parsing this tag. DNG readers should also detect the case where data blocks are missing from the end of the sequence, and should assume a default value for all the missing blocks. There are no padding or alignment bytes between data blocks.'
            ),
            new ExifTag(
                50829,
                ExifImage::ActiveArea(),
                ExifType::Long(),
                'This rectangle defines the active (non-masked) pixels of the sensor. The order of the rectangle coordinates is: top, left, bottom, right.'
            ),
            new ExifTag(
                50830,
                ExifImage::MaskedAreas(),
                ExifType::Long(),
                'This tag contains a list of non-overlapping rectangle coordinates of fully masked pixels, which can be optionally used by DNG readers to measure the black encoding level. The order of each rectangle\'s coordinates is: top, left, bottom, right. If the raw image data has already had its black encoding level subtracted, then this tag should not be used, since the masked pixels are no longer useful.'
            ),
            new ExifTag(
                50831,
                ExifImage::AsShotICCProfile(),
                ExifType::Undefined(),
                'This tag contains an ICC profile that, in conjunction with the AsShotPreProfileMatrix tag, provides the camera manufacturer with a way to specify a default color rendering from camera color space coordinates (linear reference values) into the ICC profile connection space. The ICC profile connection space is an output referred colorimetric space, whereas the other color calibration tags in DNG specify a conversion into a scene referred colorimetric space. This means that the rendering in this profile should include any desired tone and gamut mapping needed to convert between scene referred values and output referred values.'
            ),
            new ExifTag(
                50832,
                ExifImage::AsShotPreProfileMatrix(),
                ExifType::SRational(),
                'This tag is used in conjunction with the AsShotICCProfile tag. It specifies a matrix that should be applied to the camera color space coordinates before processing the values through the ICC profile specified in the AsShotICCProfile tag. The matrix is stored in the row scan order. If ColorPlanes is greater than three, then this matrix can (but is not required to) reduce the dimensionality of the color data down to three components, in which case the AsShotICCProfile should have three rather than ColorPlanes input components.'
            ),
            new ExifTag(
                50833,
                ExifImage::CurrentICCProfile(),
                ExifType::Undefined(),
                'This tag is used in conjunction with the CurrentPreProfileMatrix tag. The CurrentICCProfile and CurrentPreProfileMatrix tags have the same purpose and usage as the AsShotICCProfile and AsShotPreProfileMatrix tag pair, except they are for use by raw file editors rather than camera manufacturers.'
            ),
            new ExifTag(
                50834,
                ExifImage::CurrentPreProfileMatrix(),
                ExifType::SRational(),
                'This tag is used in conjunction with the CurrentICCProfile tag. The CurrentICCProfile and CurrentPreProfileMatrix tags have the same purpose and usage as the AsShotICCProfile and AsShotPreProfileMatrix tag pair, except they are for use by raw file editors rather than camera manufacturers.'
            ),
            new ExifTag(
                50879,
                ExifImage::ColorimetricReference(),
                ExifType::Short(),
                'The DNG color model documents a transform between camera colors and CIE XYZ values. This tag describes the colorimetric reference for the CIE XYZ values. 0 = The XYZ values are scene-referred. 1 = The XYZ values are output-referred, using the ICC profile perceptual dynamic range. This tag allows output-referred data to be stored in DNG files and still processed correctly by DNG readers.'
            ),
            new ExifTag(
                50931,
                ExifImage::CameraCalibrationSignature(),
                ExifType::Byte(),
                'A UTF-8 encoded string associated with the CameraCalibration1 and CameraCalibration2 tags. The CameraCalibration1 and CameraCalibration2 tags should only be used in the DNG color transform if the string stored in the CameraCalibrationSignature tag exactly matches the string stored in the ProfileCalibrationSignature tag for the selected camera profile.'
            ),
            new ExifTag(
                50932,
                ExifImage::ProfileCalibrationSignature(),
                ExifType::Byte(),
                'A UTF-8 encoded string associated with the camera profile tags. The CameraCalibration1 and CameraCalibration2 tags should only be used in the DNG color transfer if the string stored in the CameraCalibrationSignature tag exactly matches the string stored in the ProfileCalibrationSignature tag for the selected camera profile.'
            ),
            new ExifTag(
                50933,
                ExifImage::ExtraCameraProfiles(),
                ExifType::Long(),
                'A list of file offsets to extra Camera Profile IFDs. Note that the primary camera profile tags should be stored in IFD 0, and the ExtraCameraProfiles tag should only be used if there is more than one camera profile stored in the DNG file.'
            ),
            new ExifTag(
                50934,
                ExifImage::AsShotProfileName(),
                ExifType::Byte(),
                'A UTF-8 encoded string containing the name of the "as shot" camera profile, if any.'
            ),
            new ExifTag(
                50935,
                ExifImage::NoiseReductionApplied(),
                ExifType::Rational(),
                'This tag indicates how much noise reduction has been applied to the raw data on a scale of 0.0 to 1.0. A 0.0 value indicates that no noise reduction has been applied. A 1.0 value indicates that the "ideal" amount of noise reduction has been applied, i.e. that the DNG reader should not apply additional noise reduction by default. A value of 0/0 indicates that this parameter is unknown.'
            ),
            new ExifTag(
                50936,
                ExifImage::ProfileName(),
                ExifType::Byte(),
                'A UTF-8 encoded string containing the name of the camera profile. This tag is optional if there is only a single camera profile stored in the file but is required for all camera profiles if there is more than one camera profile stored in the file.'
            ),
            new ExifTag(
                50937,
                ExifImage::ProfileHueSatMapDims(),
                ExifType::Long(),
                'This tag specifies the number of input samples in each dimension of the hue/saturation/value mapping tables. The data for these tables are stored in ProfileHueSatMapData1, ProfileHueSatMapData2 and ProfileHueSatMapData3 tags. The most common case has ValueDivisions equal to 1, so only hue and saturation are used as inputs to the mapping table.'
            ),
            new ExifTag(
                50938,
                ExifImage::ProfileHueSatMapData1(),
                ExifType::Float(),
                'This tag contains the data for the first hue/saturation/value mapping table. Each entry of the table contains three 32-bit IEEE floating-point values. The first entry is hue shift in degrees; the second entry is saturation scale factor; and the third entry is a value scale factor. The table entries are stored in the tag in nested loop order, with the value divisions in the outer loop, the hue divisions in the middle loop, and the saturation divisions in the inner loop. All zero input saturation entries are required to have a value scale factor of 1.0.'
            ),
            new ExifTag(
                50939,
                ExifImage::ProfileHueSatMapData2(),
                ExifType::Float(),
                'This tag contains the data for the second hue/saturation/value mapping table. Each entry of the table contains three 32-bit IEEE floating-point values. The first entry is hue shift in degrees; the second entry is a saturation scale factor; and the third entry is a value scale factor. The table entries are stored in the tag in nested loop order, with the value divisions in the outer loop, the hue divisions in the middle loop, and the saturation divisions in the inner loop. All zero input saturation entries are required to have a value scale factor of 1.0.'
            ),
            new ExifTag(
                50940,
                ExifImage::ProfileToneCurve(),
                ExifType::Float(),
                'This tag contains a default tone curve that can be applied while processing the image as a starting point for user adjustments. The curve is specified as a list of 32-bit IEEE floating-point value pairs in linear gamma. Each sample has an input value in the range of 0.0 to 1.0, and an output value in the range of 0.0 to 1.0. The first sample is required to be (0.0, 0.0), and the last sample is required to be (1.0, 1.0). Interpolated the curve using a cubic spline.'
            ),
            new ExifTag(
                50941,
                ExifImage::ProfileEmbedPolicy(),
                ExifType::Long(),
                'This tag contains information about the usage rules for the associated camera profile.'
            ),
            new ExifTag(
                50942,
                ExifImage::ProfileCopyright(),
                ExifType::Byte(),
                'A UTF-8 encoded string containing the copyright information for the camera profile. This string always should be preserved along with the other camera profile tags.'
            ),
            new ExifTag(
                50964,
                ExifImage::ForwardMatrix1(),
                ExifType::SRational(),
                'This tag defines a matrix that maps white balanced camera colors to XYZ D50 colors.'
            ),
            new ExifTag(
                50965,
                ExifImage::ForwardMatrix2(),
                ExifType::SRational(),
                'This tag defines a matrix that maps white balanced camera colors to XYZ D50 colors.'
            ),
            new ExifTag(
                50966,
                ExifImage::PreviewApplicationName(),
                ExifType::Byte(),
                'A UTF-8 encoded string containing the name of the application that created the preview stored in the IFD.'
            ),
            new ExifTag(
                50967,
                ExifImage::PreviewApplicationVersion(),
                ExifType::Byte(),
                'A UTF-8 encoded string containing the version number of the application that created the preview stored in the IFD.'
            ),
            new ExifTag(
                50968,
                ExifImage::PreviewSettingsName(),
                ExifType::Byte(),
                'A UTF-8 encoded string containing the name of the conversion settings (for example, snapshot name) used for the preview stored in the IFD.'
            ),
            new ExifTag(
                50969,
                ExifImage::PreviewSettingsDigest(),
                ExifType::Byte(),
                'A unique ID of the conversion settings (for example, MD5 digest) used to render the preview stored in the IFD.'
            ),
            new ExifTag(
                50970,
                ExifImage::PreviewColorSpace(),
                ExifType::Long(),
                'This tag specifies the color space in which the rendered preview in this IFD is stored. The default value for this tag is sRGB for color previews and Gray Gamma 2.2 for monochrome previews.'
            ),
            new ExifTag(
                50971,
                ExifImage::PreviewDateTime(),
                ExifType::Ascii(),
                'This tag is an ASCII string containing the name of the date/time at which the preview stored in the IFD was rendered. The date/time is encoded using ISO 8601 format.'
            ),
            new ExifTag(
                50972,
                ExifImage::RawImageDigest(),
                ExifType::Undefined(),
                'This tag is an MD5 digest of the raw image data. All pixels in the image are processed in row-scan order. Each pixel is zero padded to 16 or 32 bits deep (16-bit for data less than or equal to 16 bits deep, 32-bit otherwise). The data for each pixel is processed in little-endian byte order.'
            ),
            new ExifTag(
                50973,
                ExifImage::OriginalRawFileDigest(),
                ExifType::Undefined(),
                'This tag is an MD5 digest of the data stored in the OriginalRawFileData tag.'
            ),
            new ExifTag(
                50974,
                ExifImage::SubTileBlockSize(),
                ExifType::Long(),
                'Normally, the pixels within a tile are stored in simple row-scan order. This tag specifies that the pixels within a tile should be grouped first into rectangular blocks of the specified size. These blocks are stored in row-scan order. Within each block, the pixels are stored in row-scan order. The use of a non-default value for this tag requires setting the DNGBackwardVersion tag to at least 1.2.0.0.'
            ),
            new ExifTag(
                50975,
                ExifImage::RowInterleaveFactor(),
                ExifType::Long(),
                'This tag specifies that rows of the image are stored in interleaved order. The value of the tag specifies the number of interleaved fields. The use of a non-default value for this tag requires setting the DNGBackwardVersion tag to at least 1.2.0.0.'
            ),
            new ExifTag(
                50981,
                ExifImage::ProfileLookTableDims(),
                ExifType::Long(),
                'This tag specifies the number of input samples in each dimension of a default "look" table. The data for this table is stored in the ProfileLookTableData tag.'
            ),
            new ExifTag(
                50982,
                ExifImage::ProfileLookTableData(),
                ExifType::Float(),
                'This tag contains a default "look" table that can be applied while processing the image as a starting point for user adjustment. This table uses the same format as the tables stored in the ProfileHueSatMapData1 and ProfileHueSatMapData2 tags, and is applied in the same color space. However, it should be applied later in the processing pipe, after any exposure compensation and/or fill light stages, but before any tone curve stage. Each entry of the table contains three 32-bit IEEE floating-point values. The first entry is hue shift in degrees, the second entry is a saturation scale factor, and the third entry is a value scale factor. The table entries are stored in the tag in nested loop order, with the value divisions in the outer loop, the hue divisions in the middle loop, and the saturation divisions in the inner loop. All zero input saturation entries are required to have a value scale factor of 1.0.'
            ),
            new ExifTag(
                51008,
                ExifImage::OpcodeList1(),
                ExifType::Undefined(),
                'Specifies the list of opcodes that should be applied to the raw image, as read directly from the file.'
            ),
            new ExifTag(
                51009,
                ExifImage::OpcodeList2(),
                ExifType::Undefined(),
                'Specifies the list of opcodes that should be applied to the raw image, just after it has been mapped to linear reference values.'
            ),
            new ExifTag(
                51022,
                ExifImage::OpcodeList3(),
                ExifType::Undefined(),
                'Specifies the list of opcodes that should be applied to the raw image, just after it has been demosaiced.'
            ),
            new ExifTag(
                51041,
                ExifImage::NoiseProfile(),
                ExifType::Double(),
                'NoiseProfile describes the amount of noise in a raw image. Specifically, this tag models the amount of signal-dependent photon (shot) noise and signal-independent sensor readout noise, two common sources of noise in raw images. The model assumes that the noise is white and spatially independent, ignoring fixed pattern effects and other sources of noise (e.g., pixel response non-uniformity, spatially-dependent thermal effects, etc.).'
            ),
            new ExifTag(
                51043,
                ExifImage::TimeCodes(),
                ExifType::Byte(),
                'The optional TimeCodes tag shall contain an ordered array of time codes. All time codes shall be 8 bytes long and in binary format. The tag may contain from 1 to 10 time codes. When the tag contains more than one time code, the first one shall be the default time code. This specification does not prescribe how to use multiple time codes. Each time code shall be as defined for the 8-byte time code structure in SMPTE 331M-2004, Section 8.3. See also SMPTE 12-1-2008 and SMPTE 309-1999.'
            ),
            new ExifTag(
                51044,
                ExifImage::FrameRate(),
                ExifType::SRational(),
                'The optional FrameRate tag shall specify the video frame rate in number of image frames per second, expressed as a signed rational number. The numerator shall be non-negative and the denominator shall be positive. This field value is identical to the sample rate field in SMPTE 377-1-2009.'
            ),
            new ExifTag(
                51058,
                ExifImage::TStop(),
                ExifType::SRational(),
                'The optional TStop tag shall specify the T-stop of the actual lens, expressed as an unsigned rational number. T-stop is also known as T-number or the photometric aperture of the lens. (F-number is the geometric aperture of the lens.) When the exact value is known, the T-stop shall be specified using a single number. Alternately, two numbers shall be used to indicate a T-stop range, in which case the first number shall be the minimum T-stop and the second number shall be the maximum T-stop.'
            ),
            new ExifTag(
                51081,
                ExifImage::ReelName(),
                ExifType::Ascii(),
                'The optional ReelName tag shall specify a name for a sequence of images, where each image in the sequence has a unique image identifier (including but not limited to file name, frame number, date time, time code).'
            ),
            new ExifTag(
                51105,
                ExifImage::CameraLabel(),
                ExifType::Ascii(),
                'The optional CameraLabel tag shall specify a text label for how the camera is used or assigned in this clip. This tag is similar to CameraLabel in XMP.'
            ),
            new ExifTag(
                51089,
                ExifImage::OriginalDefaultFinalSize(),
                ExifType::Long(),
                'If this file is a proxy for a larger original DNG file, this tag specifics the default final size of the larger original file from which this proxy was generated. The default value for this tag is default final size of the current DNG file, which is DefaultCropSize * DefaultScale.'
            ),
            new ExifTag(
                51090,
                ExifImage::OriginalBestQualityFinalSize(),
                ExifType::Long(),
                'If this file is a proxy for a larger original DNG file, this tag specifics the best quality final size of the larger original file from which this proxy was generated. The default value for this tag is the OriginalDefaultFinalSize, if specified. Otherwise the default value for this tag is the best quality size of the current DNG file, which is DefaultCropSize * DefaultScale * BestQualityScale.'
            ),
            new ExifTag(
                51091,
                ExifImage::OriginalDefaultCropSize(),
                ExifType::Long(),
                'If this file is a proxy for a larger original DNG file, this tag specifics the DefaultCropSize of the larger original file from which this proxy was generated. The default value for this tag is OriginalDefaultFinalSize, if specified. Otherwise, the default value for this tag is the DefaultCropSize of the current DNG file.'
            ),
            new ExifTag(
                51107,
                ExifImage::ProfileHueSatMapEncoding(),
                ExifType::Long(),
                'Provides a way for color profiles to specify how indexing into a 3D HueSatMap is performed during raw conversion. This tag is not applicable to 2.5D HueSatMap tables (i.e., where the Value dimension is 1).'
            ),
            new ExifTag(
                51108,
                ExifImage::ProfileLookTableEncoding(),
                ExifType::Long(),
                'Provides a way for color profiles to specify how indexing into a 3D LookTable is performed during raw conversion. This tag is not applicable to a 2.5D LookTable (i.e., where the Value dimension is 1).'
            ),
            new ExifTag(
                51109,
                ExifImage::BaselineExposureOffset(),
                ExifType::SRational(),
                'Provides a way for color profiles to increase or decrease exposure during raw conversion. BaselineExposureOffset specifies the amount (in EV units) to add to the BaselineExposure tag during image rendering. For example, if the BaselineExposure value for a given camera model is +0.3, and the BaselineExposureOffset value for a given camera profile used to render an image for that camera model is -0.7, then the actual default exposure value used during rendering will be +0.3 - 0.7 = -0.4.'
            ),
            new ExifTag(
                51110,
                ExifImage::DefaultBlackRender(),
                ExifType::Long(),
                'This optional tag in a color profile provides a hint to the raw converter regarding how to handle the black point (e.g., flare subtraction) during rendering. If set to Auto, the raw converter should perform black subtraction during rendering. If set to None, the raw converter should not perform any black subtraction during rendering.'
            ),
            new ExifTag(
                51111,
                ExifImage::NewRawImageDigest(),
                ExifType::Byte(),
                'This tag is a modified MD5 digest of the raw image data. It has been updated from the algorithm used to compute the RawImageDigest tag be more multi-processor friendly, and to support lossy compression algorithms.'
            ),
            new ExifTag(
                51112,
                ExifImage::RawToPreviewGain(),
                ExifType::Double(),
                'The gain (what number the sample values are multiplied by) between the main raw IFD and the preview IFD containing this tag.'
            ),
            new ExifTag(
                51125,
                ExifImage::DefaultUserCrop(),
                ExifType::Rational(),
                'Specifies a default user crop rectangle in relative coordinates. The values must satisfy: 0.0 <= top < bottom <= 1.0, 0.0 <= left < right <= 1.0.The default values of (top = 0, left = 0, bottom = 1, right = 1) correspond exactly to the default crop rectangle (as specified by the DefaultCropOrigin and DefaultCropSize tags).'
            ),
            new ExifTag(
                51177,
                ExifImage::DepthFormat(),
                ExifType::Short(),
                'Specifies the encoding of any depth data in the file. Can be unknown (apart from nearer distances being closer to zero, and farther distances being closer to the maximum value), linear (values vary linearly from zero representing DepthNear to the maximum value representing DepthFar), or inverse (values are stored inverse linearly, with zero representing DepthNear and the maximum value representing DepthFar).'
            ),
            new ExifTag(
                51178,
                ExifImage::DepthNear(),
                ExifType::Rational(),
                'Specifies distance from the camera represented by the zero value in the depth map. 0/0 means unknown.'
            ),
            new ExifTag(
                51179,
                ExifImage::DepthFar(),
                ExifType::Rational(),
                'Specifies distance from the camera represented by the maximum value in the depth map. 0/0 means unknown. 1/0 means infinity, which is valid for unknown and inverse depth formats.'
            ),
            new ExifTag(
                51180,
                ExifImage::DepthUnits(),
                ExifType::Short(),
                'Specifies the measurement units for the DepthNear and DepthFar tags.'
            ),
            new ExifTag(
                51181,
                ExifImage::DepthMeasureType(),
                ExifType::Short(),
                'Specifies the measurement geometry for the depth map. Can be unknown, measured along the optical axis, or measured along the optical ray passing through each pixel.'
            ),
            new ExifTag(
                51182,
                ExifImage::EnhanceParams(),
                ExifType::Ascii(),
                'A string that documents how the enhanced image data was processed.'
            ),
            new ExifTag(
                52525,
                ExifImage::ProfileGainTableMap(),
                ExifType::Undefined(),
                'Contains spatially varying gain tables that can be applied while processing the image as a starting point for user adjustments.'
            ),
            new ExifTag(
                52526,
                ExifImage::SemanticName(),
                ExifType::Ascii(),
                'A string that identifies the semantic mask.'
            ),
            new ExifTag(
                52528,
                ExifImage::SemanticInstanceID(),
                ExifType::Ascii(),
                'A string that identifies a specific instance in a semantic mask.'
            ),
            new ExifTag(
                52529,
                ExifImage::CalibrationIlluminant3(),
                ExifType::Short(),
                'The illuminant used for an optional thrid set of color calibration tags (ColorMatrix3, CameraCalibration3, ReductionMatrix3). The legal values for this tag are the same as the legal values for the LightSource EXIF tag; CalibrationIlluminant1 and CalibrationIlluminant2 must also be present. If set to 255 (Other), then the IFD must also include a IlluminantData3 tag to specify the x-y chromaticity or spectral power distribution function for this illuminant.'
            ),
            new ExifTag(
                52530,
                ExifImage::CameraCalibration3(),
                ExifType::SRational(),
                'CameraCalibration3 defines a calibration matrix that transforms reference camera native space values to individual camera native space values under the third calibration illuminant. The matrix is stored in row scan order. This matrix is stored separately from the matrix specified by the ColorMatrix3 tag to allow raw converters to swap in replacement color matrices based on UniqueCameraModel tag, while still taking advantage of any per-individual camera calibration performed by the camera manufacturer.'
            ),
            new ExifTag(
                52531,
                ExifImage::ColorMatrix3(),
                ExifType::SRational(),
                'ColorMatrix3 defines a transformation matrix that converts XYZ values to reference camera native color space values, under the third calibration illuminant. The matrix values are stored in row scan order.'
            ),
            new ExifTag(
                52532,
                ExifImage::ForwardMatrix3(),
                ExifType::SRational(),
                'This tag defines a matrix that maps white balanced camera colors to XYZ D50 colors.'
            ),
            new ExifTag(
                52533,
                ExifImage::IlluminantData1(),
                ExifType::Undefined(),
                'When the CalibrationIlluminant1 tag is set to 255 (Other), then the IlluminantData1 tag is required and specifies the data for the first illuminant. Otherwise, this tag is ignored. The illuminant data may be specified as either a x-y chromaticity coordinate or as a spectral power distribution function.'
            ),
            new ExifTag(
                52534,
                ExifImage::IlluminantData2(),
                ExifType::Undefined(),
                'When the CalibrationIlluminant2 tag is set to 255 (Other), then the IlluminantData2 tag is required and specifies the data for the second illuminant. Otherwise, this tag is ignored. The format of the data is the same as IlluminantData1.'
            ),
            new ExifTag(
                52535,
                ExifImage::IlluminantData3(),
                ExifType::Undefined(),
                'When the CalibrationIlluminant3 tag is set to 255 (Other), then the IlluminantData3 tag is required and specifies the data for the third illuminant. Otherwise, this tag is ignored. The format of the data is the same as IlluminantData1.'
            ),
            new ExifTag(
                52536,
                ExifImage::MaskSubArea(),
                ExifType::Long(),
                'This tag identifies the crop rectangle of this IFD\'s mask, relative to the main image.'
            ),
            new ExifTag(
                52537,
                ExifImage::ProfileHueSatMapData3(),
                ExifType::Float(),
                'This tag contains the data for the third hue/saturation/value mapping table. Each entry of the table contains three 32-bit IEEE floating-point values. The first entry is hue shift in degrees; the second entry is saturation scale factor; and the third entry is a value scale factor. The table entries are stored in the tag in nested loop order, with the value divisions in the outer loop, the hue divisions in the middle loop, and the saturation divisions in the inner loop. All zero input saturation entries are required to have a value scale factor of 1.0.'
            ),
            new ExifTag(
                52538,
                ExifImage::ReductionMatrix3(),
                ExifType::SRational(),
                'ReductionMatrix3 defines a dimensionality reduction matrix for use as the first stage in converting color camera native space values to XYZ values, under the third calibration illuminant. This tag may only be used if ColorPlanes is greater than 3. The matrix is stored in row scan order.'
            ),
            new ExifTag(
                52539,
                ExifImage::RGBTables(),
                ExifType::Undefined(),
                'This tag specifies color transforms that can be applied to masked image regions. Color transforms are specified using RGB-to-RGB color lookup tables. These tables are associated with Semantic Masks to limit the color transform to a sub-region of the image. The overall color transform is a linear combination of the color tables, weighted by their corresponding Semantic Masks.'
            ),
            new ExifTag(
                33434, ExifPhoto::ExposureTime(), ExifType::Rational(), 'Exposure time, given in seconds (sec).'
            ),
            new ExifTag(33437, ExifPhoto::FNumber(), ExifType::Rational(), 'The F number.'),
            new ExifTag(
                34850,
                ExifPhoto::ExposureProgram(),
                ExifType::Short(),
                'The class of the program used by the camera to set exposure when the picture is taken.'
            ),
            new ExifTag(
                34852,
                ExifPhoto::SpectralSensitivity(),
                ExifType::Ascii(),
                'Indicates the spectral sensitivity of each channel of the camera used. The tag value is an ASCII string compatible with the standard developed by the ASTM Technical Committee.'
            ),
            new ExifTag(
                34855,
                ExifPhoto::ISOSpeedRatings(),
                ExifType::Short(),
                'Indicates the ISO Speed and ISO Latitude of the camera or input device as specified in ISO 12232.'
            ),
            new ExifTag(
                34856,
                ExifPhoto::OECF(),
                ExifType::Undefined(),
                'Indicates the Opto-Electoric Conversion Function (OECF) specified in ISO 14524. <OECF> is the relationship between the camera optical input and the image values.'
            ),
            new ExifTag(
                34864,
                ExifPhoto::SensitivityType(),
                ExifType::Short(),
                'The SensitivityType tag indicates which one of the parameters of ISO12232 is the PhotographicSensitivity tag. Although it is an optional tag, it should be recorded when a PhotographicSensitivity tag is recorded. Value = 4, 5, 6, or 7 may be used in case that the values of plural parameters are the same.'
            ),
            new ExifTag(
                34865,
                ExifPhoto::StandardOutputSensitivity(),
                ExifType::Long(),
                'This tag indicates the standard output sensitivity value of a camera or input device defined in ISO 12232. When recording this tag, the PhotographicSensitivity and SensitivityType tags shall also be recorded.'
            ),
            new ExifTag(
                34866,
                ExifPhoto::RecommendedExposureIndex(),
                ExifType::Long(),
                'This tag indicates the recommended exposure index value of a camera or input device defined in ISO 12232. When recording this tag, the PhotographicSensitivity and SensitivityType tags shall also be recorded.'
            ),
            new ExifTag(
                34867,
                ExifPhoto::ISOSpeed(),
                ExifType::Long(),
                'This tag indicates the ISO speed value of a camera or input device that is defined in ISO 12232. When recording this tag, the PhotographicSensitivity and SensitivityType tags shall also be recorded.'
            ),
            new ExifTag(
                34868,
                ExifPhoto::ISOSpeedLatitudeyyy(),
                ExifType::Long(),
                'This tag indicates the ISO speed latitude yyy value of a camera or input device that is defined in ISO 12232. However, this tag shall not be recorded without ISOSpeed and ISOSpeedLatitudezzz.'
            ),
            new ExifTag(
                34869,
                ExifPhoto::ISOSpeedLatitudezzz(),
                ExifType::Long(),
                'This tag indicates the ISO speed latitude zzz value of a camera or input device that is defined in ISO 12232. However, this tag shall not be recorded without ISOSpeed and ISOSpeedLatitudeyyy.'
            ),
            new ExifTag(
                36864,
                ExifPhoto::ExifVersion(),
                ExifType::Undefined(),
                'The version of this standard supported. Nonexistence of this field is taken to mean nonconformance to the standard.'
            ),
            new ExifTag(
                36867,
                ExifPhoto::DateTimeOriginal(),
                ExifType::Ascii(),
                'The date and time when the original image data was generated. For a digital still camera the date and time the picture was taken are recorded.'
            ),
            new ExifTag(
                36868,
                ExifPhoto::DateTimeDigitized(),
                ExifType::Ascii(),
                'The date and time when the image was stored as digital data.'
            ),
            new ExifTag(
                36880,
                ExifPhoto::OffsetTime(),
                ExifType::Ascii(),
                'Time difference from Universal Time Coordinated including daylight saving time of DateTime tag.'
            ),
            new ExifTag(
                36881,
                ExifPhoto::OffsetTimeOriginal(),
                ExifType::Ascii(),
                'Time difference from Universal Time Coordinated including daylight saving time of DateTimeOriginal tag.'
            ),
            new ExifTag(
                36882,
                ExifPhoto::OffsetTimeDigitized(),
                ExifType::Ascii(),
                'Time difference from Universal Time Coordinated including daylight saving time of DateTimeDigitized tag.'
            ),
            new ExifTag(
                37121,
                ExifPhoto::ComponentsConfiguration(),
                ExifType::Undefined(),
                'Information specific to compressed data. The channels of each component are arranged in order from the 1st component to the 4th. For uncompressed data the data arrangement is given in the <PhotometricInterpretation> tag. However, since <PhotometricInterpretation> can only express the order of Y, Cb and Cr, this tag is provided for cases when compressed data uses components other than Y, Cb, and Cr and to enable support of other sequences.'
            ),
            new ExifTag(
                37122,
                ExifPhoto::CompressedBitsPerPixel(),
                ExifType::Rational(),
                'Information specific to compressed data. The compression mode used for a compressed image is indicated in unit bits per pixel.'
            ),
            new ExifTag(
                37377,
                ExifPhoto::ShutterSpeedValue(),
                ExifType::SRational(),
                'Shutter speed. The unit is the APEX (Additive System of Photographic Exposure) setting.'
            ),
            new ExifTag(
                37378,
                ExifPhoto::ApertureValue(),
                ExifType::Rational(),
                'The lens aperture. The unit is the APEX value.'
            ),
            new ExifTag(
                37379,
                ExifPhoto::BrightnessValue(),
                ExifType::SRational(),
                'The value of brightness. The unit is the APEX value. Ordinarily it is given in the range of -99.99 to 99.99.'
            ),
            new ExifTag(
                37380,
                ExifPhoto::ExposureBiasValue(),
                ExifType::SRational(),
                'The exposure bias. The units is the APEX value. Ordinarily it is given in the range of -99.99 to 99.99.'
            ),
            new ExifTag(
                37381,
                ExifPhoto::MaxApertureValue(),
                ExifType::Rational(),
                'The smallest F number of the lens. The unit is the APEX value. Ordinarily it is given in the range of 00.00 to 99.99, but it is not limited to this range.'
            ),
            new ExifTag(
                37382,
                ExifPhoto::SubjectDistance(),
                ExifType::Rational(),
                'The distance to the subject, given in meters.'
            ),
            new ExifTag(37383, ExifPhoto::MeteringMode(), ExifType::Short(), 'The metering mode.'),
            new ExifTag(37384, ExifPhoto::LightSource(), ExifType::Short(), 'The kind of light source.'),
            new ExifTag(
                37385,
                ExifPhoto::Flash(),
                ExifType::Short(),
                'This tag is recorded when an image is taken using a strobe light (flash).'
            ),
            new ExifTag(
                37386,
                ExifPhoto::FocalLength(),
                ExifType::Rational(),
                'The actual focal length of the lens, in mm. Conversion is not made to the focal length of a 35 mm film camera.'
            ),
            new ExifTag(
                37396,
                ExifPhoto::SubjectArea(),
                ExifType::Short(),
                'This tag indicates the location and area of the main subject in the overall scene.'
            ),
            new ExifTag(
                37500,
                ExifPhoto::MakerNote(),
                ExifType::Undefined(),
                'A tag for manufacturers of Exif writers to record any desired information. The contents are up to the manufacturer.'
            ),
            new ExifTag(
                37510,
                ExifPhoto::UserComment(),
                ExifType::Comment(),
                'A tag for Exif users to write keywords or comments on the image besides those in <ImageDescription>, and without the character code limitations of the <ImageDescription> tag.'
            ),
            new ExifTag(
                37520,
                ExifPhoto::SubSecTime(),
                ExifType::Ascii(),
                'A tag used to record fractions of seconds for the <DateTime> tag.'
            ),
            new ExifTag(
                37521,
                ExifPhoto::SubSecTimeOriginal(),
                ExifType::Ascii(),
                'A tag used to record fractions of seconds for the <DateTimeOriginal> tag.'
            ),
            new ExifTag(
                37522,
                ExifPhoto::SubSecTimeDigitized(),
                ExifType::Ascii(),
                'A tag used to record fractions of seconds for the <DateTimeDigitized> tag.'
            ),
            new ExifTag(
                37888,
                ExifPhoto::Temperature(),
                ExifType::SRational(),
                'Temperature as the ambient situation at the shot, for example the room temperature where the photographer was holding the camera. The unit is degrees C.'
            ),
            new ExifTag(
                37889,
                ExifPhoto::Humidity(),
                ExifType::Rational(),
                'Humidity as the ambient situation at the shot, for example the room humidity where the photographer was holding the camera. The unit is %.'
            ),
            new ExifTag(
                37890,
                ExifPhoto::Pressure(),
                ExifType::Rational(),
                'Pressure as the ambient situation at the shot, for example the room atmosphere where the photographer was holding the camera or the water pressure under the sea. The unit is hPa.'
            ),
            new ExifTag(
                37891,
                ExifPhoto::WaterDepth(),
                ExifType::SRational(),
                'Water depth as the ambient situation at the shot, for example the water depth of the camera at underwater photography. The unit is m.'
            ),
            new ExifTag(
                37892,
                ExifPhoto::Acceleration(),
                ExifType::Rational(),
                'Acceleration (a scalar regardless of direction) as the ambient situation at the shot, for example the driving acceleration of the vehicle which the photographer rode on at the shot. The unit is mGal (10e-5 m/s^2).'
            ),
            new ExifTag(
                37893,
                ExifPhoto::CameraElevationAngle(),
                ExifType::SRational(),
                'Elevation/depression. angle of the orientation of the camera(imaging optical axis) as the ambient situation at the shot. The unit is degrees.'
            ),
            new ExifTag(
                40960,
                ExifPhoto::FlashpixVersion(),
                ExifType::Undefined(),
                'The FlashPix format version supported by a FPXR file.'
            ),
            new ExifTag(
                40961,
                ExifPhoto::ColorSpace(),
                ExifType::Short(),
                'The color space information tag is always recorded as the color space specifier. Normally sRGB is used to define the color space based on the PC monitor conditions and environment. If a color space other than sRGB is used, Uncalibrated is set. Image data recorded as Uncalibrated can be treated as sRGB when it is converted to FlashPix.'
            ),
            new ExifTag(
                40962,
                ExifPhoto::PixelXDimension(),
                ExifType::Long(),
                'Information specific to compressed data. When a compressed file is recorded, the valid width of the meaningful image must be recorded in this tag, whether or not there is padding data or a restart marker. This tag should not exist in an uncompressed file.'
            ),
            new ExifTag(
                40963,
                ExifPhoto::PixelYDimension(),
                ExifType::Long(),
                'Information specific to compressed data. When a compressed file is recorded, the valid height of the meaningful image must be recorded in this tag, whether or not there is padding data or a restart marker. This tag should not exist in an uncompressed file. Since data padding is unnecessary in the vertical direction, the number of lines recorded in this valid image height tag will in fact be the same as that recorded in the SOF.'
            ),
            new ExifTag(
                40964,
                ExifPhoto::RelatedSoundFile(),
                ExifType::Ascii(),
                'This tag is used to record the name of an audio file related to the image data. The only relational information recorded here is the Exif audio file name and extension (an ASCII string consisting of 8 characters + ' . ' + 3 characters). The path is not recorded.'
            ),
            new ExifTag(
                40965,
                ExifPhoto::InteroperabilityTag(),
                ExifType::Long(),
                'Interoperability IFD is composed of tags which stores the information to ensure the Interoperability and pointed by the following tag located in Exif IFD. The Interoperability structure of Interoperability IFD is the same as TIFF defined IFD structure but does not contain the image data characteristically compared with normal TIFF IFD.'
            ),
            new ExifTag(
                41483,
                ExifPhoto::FlashEnergy(),
                ExifType::Rational(),
                'Indicates the strobe energy at the time the image is captured, as measured in Beam Candle Power Seconds (BCPS).'
            ),
            new ExifTag(
                41484,
                ExifPhoto::SpatialFrequencyResponse(),
                ExifType::Undefined(),
                'This tag records the camera or input device spatial frequency table and SFR values in the direction of image width, image height, and diagonal direction, as specified in ISO 12233.'
            ),
            new ExifTag(
                41486,
                ExifPhoto::FocalPlaneXResolution(),
                ExifType::Rational(),
                'Indicates the number of pixels in the image width (X) direction per <FocalPlaneResolutionUnit> on the camera focal plane.'
            ),
            new ExifTag(
                41487,
                ExifPhoto::FocalPlaneYResolution(),
                ExifType::Rational(),
                'Indicates the number of pixels in the image height (V) direction per <FocalPlaneResolutionUnit> on the camera focal plane.'
            ),
            new ExifTag(
                41488,
                ExifPhoto::FocalPlaneResolutionUnit(),
                ExifType::Short(),
                'Indicates the unit for measuring <FocalPlaneXResolution> and <FocalPlaneYResolution>. This value is the same as the <ResolutionUnit>.'
            ),
            new ExifTag(
                41492,
                ExifPhoto::SubjectLocation(),
                ExifType::Short(),
                'Indicates the location of the main subject in the scene. The value of this tag represents the pixel at the center of the main subject relative to the left edge, prior to rotation processing as per the <Rotation> tag. The first value indicates the X column number and second indicates the Y row number.'
            ),
            new ExifTag(
                41493,
                ExifPhoto::ExposureIndex(),
                ExifType::Rational(),
                'Indicates the exposure index selected on the camera or input device at the time the image is captured.'
            ),
            new ExifTag(
                41495,
                ExifPhoto::SensingMethod(),
                ExifType::Short(),
                'Indicates the image sensor type on the camera or input device.'
            ),
            new ExifTag(
                41728,
                ExifPhoto::FileSource(),
                ExifType::Undefined(),
                'Indicates the image source. If a DSC recorded the image, this tag value of this tag always be set to 3, indicating that the image was recorded on a DSC.'
            ),
            new ExifTag(
                41729,
                ExifPhoto::SceneType(),
                ExifType::Undefined(),
                'Indicates the type of scene. If a DSC recorded the image, this tag value must always be set to 1, indicating that the image was directly photographed.'
            ),
            new ExifTag(
                41730,
                ExifPhoto::CFAPattern(),
                ExifType::Undefined(),
                'Indicates the color filter array (CFA) geometric pattern of the image sensor when a one-chip color area sensor is used. It does not apply to all sensing methods.'
            ),
            new ExifTag(
                41985,
                ExifPhoto::CustomRendered(),
                ExifType::Short(),
                'This tag indicates the use of special processing on image data, such as rendering geared to output. When special processing is performed, the reader is expected to disable or minimize any further processing.'
            ),
            new ExifTag(
                41986,
                ExifPhoto::ExposureMode(),
                ExifType::Short(),
                'This tag indicates the exposure mode set when the image was shot. In auto-bracketing mode, the camera shoots a series of frames of the same scene at different exposure settings.'
            ),
            new ExifTag(
                41987,
                ExifPhoto::WhiteBalance(),
                ExifType::Short(),
                'This tag indicates the white balance mode set when the image was shot.'
            ),
            new ExifTag(
                41988,
                ExifPhoto::DigitalZoomRatio(),
                ExifType::Rational(),
                'This tag indicates the digital zoom ratio when the image was shot. If the numerator of the recorded value is 0, this indicates that digital zoom was not used.'
            ),
            new ExifTag(
                41989,
                ExifPhoto::FocalLengthIn35mmFilm(),
                ExifType::Short(),
                'This tag indicates the equivalent focal length assuming a 35mm film camera, in mm. A value of 0 means the focal length is unknown. Note that this tag differs from the <FocalLength> tag.'
            ),
            new ExifTag(
                41990,
                ExifPhoto::SceneCaptureType(),
                ExifType::Short(),
                'This tag indicates the type of scene that was shot. It can also be used to record the mode in which the image was shot. Note that this differs from the <SceneType> tag.'
            ),
            new ExifTag(
                41991,
                ExifPhoto::GainControl(),
                ExifType::Short(),
                'This tag indicates the degree of overall image gain adjustment.'
            ),
            new ExifTag(
                41992,
                ExifPhoto::Contrast(),
                ExifType::Short(),
                'This tag indicates the direction of contrast processing applied by the camera when the image was shot.'
            ),
            new ExifTag(
                41993,
                ExifPhoto::Saturation(),
                ExifType::Short(),
                'This tag indicates the direction of saturation processing applied by the camera when the image was shot.'
            ),
            new ExifTag(
                41994,
                ExifPhoto::Sharpness(),
                ExifType::Short(),
                'This tag indicates the direction of sharpness processing applied by the camera when the image was shot.'
            ),
            new ExifTag(
                41995,
                ExifPhoto::DeviceSettingDescription(),
                ExifType::Undefined(),
                'This tag indicates information on the picture-taking conditions of a particular camera model. The tag is used only to indicate the picture-taking conditions in the reader.'
            ),
            new ExifTag(
                41996,
                ExifPhoto::SubjectDistanceRange(),
                ExifType::Short(),
                'This tag indicates the distance to the subject.'
            ),
            new ExifTag(
                42016,
                ExifPhoto::ImageUniqueID(),
                ExifType::Ascii(),
                'This tag indicates an identifier assigned uniquely to each image. It is recorded as an ASCII string equivalent to hexadecimal notation and 128-bit fixed length.'
            ),
            new ExifTag(
                42032,
                ExifPhoto::CameraOwnerName(),
                ExifType::Ascii(),
                'This tag records the owner of a camera used in photography as an ASCII string.'
            ),
            new ExifTag(
                42033,
                ExifPhoto::BodySerialNumber(),
                ExifType::Ascii(),
                'This tag records the serial number of the body of the camera that was used in photography as an ASCII string.'
            ),
            new ExifTag(
                42034,
                ExifPhoto::LensSpecification(),
                ExifType::Rational(),
                'This tag notes minimum focal length, maximum focal length, minimum F number in the minimum focal length, and minimum F number in the maximum focal length, which are specification information for the lens that was used in photography. When the minimum F number is unknown, the notation is 0/0'
            ),
            new ExifTag(
                42035,
                ExifPhoto::LensMake(),
                ExifType::Ascii(),
                'This tag records the lens manufactor as an ASCII string.'
            ),
            new ExifTag(
                42036,
                ExifPhoto::LensModel(),
                ExifType::Ascii(),
                'This tag records the lens\'s model name and model number as an ASCII string.'
            ),
            new ExifTag(
                42037,
                ExifPhoto::LensSerialNumber(),
                ExifType::Ascii(),
                'This tag records the serial number of the interchangeable lens that was used in photography as an ASCII string.'
            ),
            new ExifTag(
                42080,
                ExifPhoto::CompositeImage(),
                ExifType::Short(),
                'Indicates whether the recorded image is a composite image or not.'
            ),
            new ExifTag(
                42081,
                ExifPhoto::SourceImageNumberOfCompositeImage(),
                ExifType::Short(),
                'Indicates the number of the source images (tentatively recorded images) captured for a composite Image.'
            ),
            new ExifTag(
                42082,
                ExifPhoto::SourceExposureTimesOfCompositeImage(),
                ExifType::Undefined(),
                'For a composite image, records the parameters relating exposure time of the exposures for generating the said composite image, such as respective exposure times of captured source images (tentatively recorded images).'
            ),
            new ExifTag(
                42240,
                ExifPhoto::Gamma(),
                ExifType::Rational(),
                'Indicates the value of coefficient gamma. The formula of transfer function used for image reproduction is expressed as follows: (reproduced value) = (input value)^gamma. Both reproduced value and input value indicate normalized value, whose minimum value is 0 and maximum value is 1.'
            ),
            new ExifTag(
                1,
                ExifIop::InteroperabilityIndex(),
                ExifType::Ascii(),
                'Indicates the identification of the Interoperability rule. Use "R98" for stating ExifR98 Rules. Four bytes used including the termination code (NULL). see the separate volume of Recommended Exif Interoperability Rules (ExifR98) for other tags used for ExifR98.'
            ),
            new ExifTag(2, ExifIop::InteroperabilityVersion(), ExifType::Undefined(), 'Interoperability version'),
            new ExifTag(4096, ExifIop::RelatedImageFileFormat(), ExifType::Ascii(), 'File format of image file'),
            new ExifTag(4097, ExifIop::RelatedImageWidth(), ExifType::Long(), 'Image width'),
            new ExifTag(4098, ExifIop::RelatedImageLength(), ExifType::Long(), 'Image height'),
            new ExifTag(
                0,
                ExifGPSInfo::GPSVersionID(),
                ExifType::Byte(),
                'Indicates the version of <GPSInfoIFD>. The version is given as 2.0.0.0. This tag is mandatory when <GPSInfo> tag is present. (Note: The <GPSVersionID> tag is given in bytes, unlike the <ExifVersion> tag. When the version is 2.0.0.0, the tag value is 02000000.H).'
            ),
            new ExifTag(
                1,
                ExifGPSInfo::GPSLatitudeRef(),
                ExifType::Ascii(),
                'Indicates whether the latitude is north or south latitude. The ASCII value \'N\' indicates north latitude, and \'S\' is south latitude.'
            ),
            new ExifTag(
                2,
                ExifGPSInfo::GPSLatitude(),
                ExifType::Rational(),
                'Indicates the latitude. The latitude is expressed as three RATIONAL values giving the degrees, minutes, and seconds, respectively. When degrees, minutes and seconds are expressed, the format is dd/1,mm/1,ss/1. When degrees and minutes are used and, for example, fractions of minutes are given up to two decimal places, the format is dd/1,mmmm/100,0/1.'
            ),
            new ExifTag(
                3,
                ExifGPSInfo::GPSLongitudeRef(),
                ExifType::Ascii(),
                'Indicates whether the longitude is east or west longitude. ASCII \'E\' indicates east longitude, and \'W\' is west longitude.'
            ),
            new ExifTag(
                4,
                ExifGPSInfo::GPSLongitude(),
                ExifType::Rational(),
                'Indicates the longitude. The longitude is expressed as three RATIONAL values giving the degrees, minutes, and seconds, respectively. When degrees, minutes and seconds are expressed, the format is ddd/1,mm/1,ss/1. When degrees and minutes are used and, for example, fractions of minutes are given up to two decimal places, the format is ddd/1,mmmm/100,0/1.'
            ),
            new ExifTag(
                5,
                ExifGPSInfo::GPSAltitudeRef(),
                ExifType::Byte(),
                'Indicates the altitude used as the reference altitude. If the reference is sea level and the altitude is above sea level, 0 is given. If the altitude is below sea level, a value of 1 is given and the altitude is indicated as an absolute value in the GSPAltitude tag. The reference unit is meters. Note that this tag is BYTE type, unlike other reference tags.'
            ),
            new ExifTag(
                6,
                ExifGPSInfo::GPSAltitude(),
                ExifType::Rational(),
                'Indicates the altitude based on the reference in GPSAltitudeRef. Altitude is expressed as one RATIONAL value. The reference unit is meters.'
            ),
            new ExifTag(
                7,
                ExifGPSInfo::GPSTimeStamp(),
                ExifType::Rational(),
                'Indicates the time as UTC (Coordinated Universal Time). <TimeStamp> is expressed as three RATIONAL values giving the hour, minute, and second (atomic clock).'
            ),
            new ExifTag(
                8,
                ExifGPSInfo::GPSSatellites(),
                ExifType::Ascii(),
                'Indicates the GPS satellites used for measurements. This tag can be used to describe the number of satellites, their ID number, angle of elevation, azimuth, SNR and other information in ASCII notation. The format is not specified. If the GPS receiver is incapable of taking measurements, value of the tag is set to NULL.'
            ),
            new ExifTag(
                9,
                ExifGPSInfo::GPSStatus(),
                ExifType::Ascii(),
                'Indicates the status of the GPS receiver when the image is recorded. "A" means measurement is in progress, and "V" means the measurement is Interoperability.'
            ),
            new ExifTag(
                10,
                ExifGPSInfo::GPSMeasureMode(),
                ExifType::Ascii(),
                'Indicates the GPS measurement mode. "2" means two-dimensional measurement and "3" means three-dimensional measurement is in progress.'
            ),
            new ExifTag(
                11,
                ExifGPSInfo::GPSDOP(),
                ExifType::Rational(),
                'Indicates the GPS DOP (data degree of precision). An HDOP value is written during two-dimensional measurement, and PDOP during three-dimensional measurement.'
            ),
            new ExifTag(
                12,
                ExifGPSInfo::GPSSpeedRef(),
                ExifType::Ascii(),
                'Indicates the unit used to express the GPS receiver speed of movement. "K" "M" and "N" represents kilometers per hour, miles per hour, and knots.'
            ),
            new ExifTag(
                13,
                ExifGPSInfo::GPSSpeed(),
                ExifType::Rational(),
                'Indicates the speed of GPS receiver movement.'
            ),
            new ExifTag(
                14,
                ExifGPSInfo::GPSTrackRef(),
                ExifType::Ascii(),
                'Indicates the reference for giving the direction of GPS receiver movement. "T" denotes true direction and "M" is magnetic direction.'
            ),
            new ExifTag(
                15,
                ExifGPSInfo::GPSTrack(),
                ExifType::Rational(),
                'Indicates the direction of GPS receiver movement. The range of values is from 0.00 to 359.99.'
            ),
            new ExifTag(
                16,
                ExifGPSInfo::GPSImgDirectionRef(),
                ExifType::Ascii(),
                'Indicates the reference for giving the direction of the image when it is captured. "T" denotes true direction and "M" is magnetic direction.'
            ),
            new ExifTag(
                17,
                ExifGPSInfo::GPSImgDirection(),
                ExifType::Rational(),
                'Indicates the direction of the image when it was captured. The range of values is from 0.00 to 359.99.'
            ),
            new ExifTag(
                18,
                ExifGPSInfo::GPSMapDatum(),
                ExifType::Ascii(),
                'Indicates the geodetic survey data used by the GPS receiver. If the survey data is restricted to Japan, the value of this tag is "TOKYO" or "WGS-84".'
            ),
            new ExifTag(
                19,
                ExifGPSInfo::GPSDestLatitudeRef(),
                ExifType::Ascii(),
                'Indicates whether the latitude of the destination point is north or south latitude. The ASCII value "N" indicates north latitude, and "S" is south latitude.'
            ),
            new ExifTag(
                20,
                ExifGPSInfo::GPSDestLatitude(),
                ExifType::Rational(),
                'Indicates the latitude of the destination point. The latitude is expressed as three RATIONAL values giving the degrees, minutes, and seconds, respectively. If latitude is expressed as degrees, minutes and seconds, a typical format would be dd/1,mm/1,ss/1. When degrees and minutes are used and, for example, fractions of minutes are given up to two decimal places, the format would be dd/1,mmmm/100,0/1.'
            ),
            new ExifTag(
                21,
                ExifGPSInfo::GPSDestLongitudeRef(),
                ExifType::Ascii(),
                'Indicates whether the longitude of the destination point is east or west longitude. ASCII "E" indicates east longitude, and "W" is west longitude.'
            ),
            new ExifTag(
                22,
                ExifGPSInfo::GPSDestLongitude(),
                ExifType::Rational(),
                'Indicates the longitude of the destination point. The longitude is expressed as three RATIONAL values giving the degrees, minutes, and seconds, respectively. If longitude is expressed as degrees, minutes and seconds, a typical format would be ddd/1,mm/1,ss/1. When degrees and minutes are used and, for example, fractions of minutes are given up to two decimal places, the format would be ddd/1,mmmm/100,0/1.'
            ),
            new ExifTag(
                23,
                ExifGPSInfo::GPSDestBearingRef(),
                ExifType::Ascii(),
                'Indicates the reference used for giving the bearing to the destination point. "T" denotes true direction and "M" is magnetic direction.'
            ),
            new ExifTag(
                24,
                ExifGPSInfo::GPSDestBearing(),
                ExifType::Rational(),
                'Indicates the bearing to the destination point. The range of values is from 0.00 to 359.99.'
            ),
            new ExifTag(
                25,
                ExifGPSInfo::GPSDestDistanceRef(),
                ExifType::Ascii(),
                'Indicates the unit used to express the distance to the destination point. "K", "M" and "N" represent kilometers, miles and knots.'
            ),
            new ExifTag(
                26,
                ExifGPSInfo::GPSDestDistance(),
                ExifType::Rational(),
                'Indicates the distance to the destination point.'
            ),
            new ExifTag(
                27,
                ExifGPSInfo::GPSProcessingMethod(),
                ExifType::Comment(),
                'A character string recording the name of the method used for location finding. The string encoding is defined using the same scheme as UserComment.'
            ),
            new ExifTag(
                28,
                ExifGPSInfo::GPSAreaInformation(),
                ExifType::Comment(),
                'A character string recording the name of the GPS area.The string encoding is defined using the same scheme as UserComment.'
            ),
            new ExifTag(
                29,
                ExifGPSInfo::GPSDateStamp(),
                ExifType::Ascii(),
                'A character string recording date and time information relative to UTC (Coordinated Universal Time). The format is "YYYY:MM:DD.".'
            ),
            new ExifTag(
                30,
                ExifGPSInfo::GPSDifferential(),
                ExifType::Short(),
                'Indicates whether differential correction is applied to the GPS receiver.'
            ),
            new ExifTag(
                31,
                ExifGPSInfo::GPSHPositioningError(),
                ExifType::Rational(),
                'This tag indicates horizontal positioning errors in meters.'
            ),
        ];
    }
}
