<?php

namespace Core;
use Countable;
Class Arr implements Countable{
    /**
     * @var array $data
     */
    protected $data = [];
    /**
     * @var $original dử liêu gốc
     */
    protected $original = null;
    /**
     * khoi tao doi tuong
     * @param array|object $data
     */
    function __construct($data)
    {
        if(is_array($data) || is_object($data)){
            // gán giá trị ban au629 cho thuộc tính original
            $this->original = $data;

            foreach ($data as $key => $value) {
                // duyệt qua mảng hoặc object để gán key, value ở level 0 cho biến data
                $this->data[$key] = $value;
            }
        }
    }

    /**
     * lấy giá trị phần tử
     * @param string|int $key
     * @param mixed $defaultValue
     * @return mixed
     */
    public function get($key,$defaultValue = null)
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : $defaultValue;
    }

    /**
     * gán giá trị
     * @param string|int $key
     * @param mixed
     * @return object instance
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * xóa phần tử
     * @param string $keys
     * @return object instance
     */
    public function remove(...$keys)
    {
        if(count($keys)){
            foreach ($keys as $key) {
                unset($this->data[$key]);
            }
        }
        else{
            $this->data = [];
        }
        return $this;
    }

    /**
     * tra về mag data
     * @return array
     */
    public function all()
    {
        return $this->data;
    }

    public function __toString()
    {
        return '';
    }

    /**
     * lấy giá trị phần tụ theo tên thuộc tính
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * gan gia tri cho phan tu
     * @param string $key
     * @param mixed $value
     * 
     * @return object
     */
    public function __set($key, $value)
    {
        return $this->set($key, $value);
    }

    /**
     * kiểm tra tồn tại
     * 
     * @return boolean
     */
    public function  __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * xóa phần tử
     * @param string $key
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    /**
     * đếm phần tử
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * trộn mảng
     * @param array $arrays
     * @return instance
     */
    public function merge(...$arrays)
    {
        $this->data = array_merge($this->data, ...$arrays);
        return $this;
    }

    /**
     * kiểm tra xem có phan tử nào giống giá trị đã cho hay ko
     * @param mixed
     * @return boolean
     */
    public function in($value)
    {
        return in_array($value, $this->data);
    }

    /**
     * gọi hàm với tên thuộc tính với tham số là giá trị default
     * @param string $name
     * @param array $arguments
     */
    public function __call($name, $arguments)
    {
        $defaultValue = count($arguments) ? $arguments[0] : null;
        return $this->get($name, $defaultValue);
    }
}