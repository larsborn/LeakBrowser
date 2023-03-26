<?php declare(strict_types=1);

namespace App\DTO;

class Path
{
    private ?string $processorName;
    private ?string $fileName;
    private ?string $emailSubject;
    private ?string $emailSenderName;
    private array $timestamps;

    /**
     * @param Timestamp[] $timestamps
     */
    public function __construct(
        ?string $processorName,
        ?string $fileName,
        ?string $emailSubject,
        ?string $emailSenderName,
        array $timestamps
    ) {
        $this->processorName = $processorName;
        $this->fileName = $fileName;
        $this->emailSubject = $emailSubject;
        $this->emailSenderName = $emailSenderName;
        $this->timestamps = $timestamps;
    }

    public function getProcessorName(): ?string
    {
        return $this->processorName;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function getEmailSubject(): ?string
    {
        return $this->emailSubject;
    }

    public function getEmailSenderName(): ?string
    {
        return $this->emailSenderName;
    }

    /**
     * @return Timestamp[]
     */
    public function getTimestamps(): array
    {
        return $this->timestamps;
    }
}
