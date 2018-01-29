<?php

namespace rollun\Downloader;

use FtpClient\FtpClient;
use rollun\callback\Callback\CallbackInterface;

class FtpDownloader implements CallbackInterface
{
    /** @var FtpClient */
    protected $ftpClient;

    /**
     * Target remote file which be downloaded
     * @var string
     */
    protected $targetFilePath;

    /**
     * File path were data will be stored
     * @var string
     */
    protected $destinationFilePath;

    /**
     * FtpDownloader constructor.
     * @param FtpClient $ftpClient client is already connected & loggined
     * @param $destinationFilePath
     * @param $targetFilePath
     */
    public function __construct(FtpClient $ftpClient, $targetFilePath, $destinationFilePath)
    {
        $this->ftpClient = $ftpClient;
        $this->targetFilePath = $targetFilePath;
        $this->destinationFilePath = $destinationFilePath;
    }

    /**
     * @param null $val
     */
    public function __invoke($val = null)
    {
        $this->download();
    }

    /**
     * Download
     */
    public function download() {
        try {
            $this->ftpClient->chdir(dirname($this->targetFilePath));
            if($this->ftpClient->get($this->destinationFilePath, $this->targetFilePath, FTP_BINARY)) {
                throw new \RuntimeException("File not be download");
            }
        } catch (\Throwable $throwable) {
            throw new FtpException("Exception by download file", $throwable->getCode(), $throwable);
        }
    }
}