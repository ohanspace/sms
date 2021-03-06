<?php
namespace Ohanspace\Sms;



class OutgoingMessage
{
    /**
     * The data that will be passed into the Illuminate View Factory
     *
     * @var array
     */
    protected $text;

    /**
     * The number messages are being sent from.
     *
     * @var string
     */
    protected $from;

    /**
     * Array of numbers a message is being sent to.
     *
     * @var array
     */
    protected $to;

    /**
     * Composes a message.
     *
     * @return \Illuminate\View\Factory
     */
    public function composeMessage()
    {
        return $this->text;
    }

    /**
     * Sets the numbers messages will be sent from.
     *
     * @param string $number Holds the number that messages
     * @return void
     */
    public function from($number)
    {
        $this->from = $number;
    }

    /**
     * Gets the from address
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Sets the to addresses
     *
     * @param string $number Holds the number that a message will be sent to.
     * @param string $carrier The carrier the number is on.
     * @return $this
     */
    public function to($number, $carrier = null)
    {
        $this->to[] = [
            'number' => $number,
            'carrier' => $carrier
        ];

        return $this;
    }

    /**
     * Returns the To addresses without the carriers
     *
     * @return array
     */
    public function getTo()
    {
        $numbers = array();
        foreach ($this->to as $to) {
            $numbers[] = $to['number'];
        }
        return $numbers;
    }

    /**
     * Returns all numbers that a message is being sent to and includes their carriers.
     *
     * @return array An array with numbers and carriers
     */
    public function getToWithCarriers()
    {
        return $this->to;
    }


    /**
     * Sets the data for the view file.
     *
     * @param array $data An array of values to be passed to the View Factory.
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }


    /**
     * Returns the view data.
     *
     * @return array
     */
    public function getText()
    {
        return $this->text;
    }


}
