<?php


namespace App\Services\Convertor;


use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\CsvEncoder;

class FileEncoder
{
    protected $formatDecode;
    protected $formatEncode;
    protected $fileContent;
    protected $fileDecodeContent;
    protected $fileEncode;

    public function __construct($formatDecode,$formatEncode,$content)
    {
        $this->formatDecode=$formatDecode;
        $this->formatEncode=$formatEncode;
        $this->fileContent=$content;
    }

    public function decode()
    {

        switch ($this->formatDecode)
        {
            case 'json':
                $decoder= new JsonEncoder();
                break;
            case 'xml':
                $decoder= new XmlEncoder();
                break;
            case 'csv':
                $decoder= new CsvEncoder();
                break;
            case 'yaml':
                $decoder= new YamlEncoder();
                break;
            default:
                return false;
        }

        $this->fileDecodeContent=$decoder->decode($this->fileContent,$this->formatDecode);

        return true;
    }


    public function encode()
    {
        switch ($this->formatEncode)
        {
            case 'json':
                $encoder= new JsonEncoder();
                break;
            case 'xml':
                $encoder= new XmlEncoder();
                break;
            case 'csv':
                $encoder= new CsvEncoder();
                break;
            case 'yaml':
                $encoder= new YamlEncoder();
                break;
            default:
                return false;
        }

        $this->fileEncode=$encoder->encode($this->fileDecodeContent,$this->formatEncode);

        return true;
    }

    public function getFileEncode()
    {
        return $this->fileEncode;
    }

    public function getFileDecodeContent()
    {
        return $this->fileDecodeContent;
    }
}