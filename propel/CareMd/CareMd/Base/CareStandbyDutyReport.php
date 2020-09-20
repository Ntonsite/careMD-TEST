<?php

namespace CareMd\CareMd\Base;

use \DateTime;
use \Exception;
use \PDO;
use CareMd\CareMd\CareStandbyDutyReportQuery as ChildCareStandbyDutyReportQuery;
use CareMd\CareMd\Map\CareStandbyDutyReportTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'care_standby_duty_report' table.
 *
 *
 *
 * @package    propel.generator.CareMd.CareMd.Base
 */
abstract class CareStandbyDutyReport implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CareMd\\CareMd\\Map\\CareStandbyDutyReportTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the report_nr field.
     *
     * @var        int
     */
    protected $report_nr;

    /**
     * The value for the dept field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $dept;

    /**
     * The value for the date field.
     *
     * Note: this column has a database default value of: NULL
     * @var        DateTime
     */
    protected $date;

    /**
     * The value for the standby_name field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $standby_name;

    /**
     * The value for the standby_start field.
     *
     * Note: this column has a database default value of: '00:00:00.000000'
     * @var        DateTime
     */
    protected $standby_start;

    /**
     * The value for the standby_end field.
     *
     * Note: this column has a database default value of: '00:00:00.000000'
     * @var        DateTime
     */
    protected $standby_end;

    /**
     * The value for the oncall_name field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $oncall_name;

    /**
     * The value for the oncall_start field.
     *
     * Note: this column has a database default value of: '00:00:00.000000'
     * @var        DateTime
     */
    protected $oncall_start;

    /**
     * The value for the oncall_end field.
     *
     * Note: this column has a database default value of: '00:00:00.000000'
     * @var        DateTime
     */
    protected $oncall_end;

    /**
     * The value for the op_room field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $op_room;

    /**
     * The value for the diagnosis_therapy field.
     *
     * @var        string
     */
    protected $diagnosis_therapy;

    /**
     * The value for the encoding field.
     *
     * @var        string
     */
    protected $encoding;

    /**
     * The value for the status field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $status;

    /**
     * The value for the history field.
     *
     * @var        string
     */
    protected $history;

    /**
     * The value for the modify_id field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $modify_id;

    /**
     * The value for the modify_time field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $modify_time;

    /**
     * The value for the create_id field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $create_id;

    /**
     * The value for the create_time field.
     *
     * Note: this column has a database default value of: NULL
     * @var        DateTime
     */
    protected $create_time;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->dept = '';
        $this->date = PropelDateTime::newInstance(NULL, null, 'DateTime');
        $this->standby_name = '';
        $this->standby_start = PropelDateTime::newInstance('00:00:00.000000', null, 'DateTime');
        $this->standby_end = PropelDateTime::newInstance('00:00:00.000000', null, 'DateTime');
        $this->oncall_name = '';
        $this->oncall_start = PropelDateTime::newInstance('00:00:00.000000', null, 'DateTime');
        $this->oncall_end = PropelDateTime::newInstance('00:00:00.000000', null, 'DateTime');
        $this->op_room = '';
        $this->status = '';
        $this->modify_id = '';
        $this->create_id = '';
        $this->create_time = PropelDateTime::newInstance(NULL, null, 'DateTime');
    }

    /**
     * Initializes internal state of CareMd\CareMd\Base\CareStandbyDutyReport object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>CareStandbyDutyReport</code> instance.  If
     * <code>obj</code> is an instance of <code>CareStandbyDutyReport</code>, delegates to
     * <code>equals(CareStandbyDutyReport)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|CareStandbyDutyReport The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [report_nr] column value.
     *
     * @return int
     */
    public function getReportNr()
    {
        return $this->report_nr;
    }

    /**
     * Get the [dept] column value.
     *
     * @return string
     */
    public function getDept()
    {
        return $this->dept;
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = NULL)
    {
        if ($format === null) {
            return $this->date;
        } else {
            return $this->date instanceof \DateTimeInterface ? $this->date->format($format) : null;
        }
    }

    /**
     * Get the [standby_name] column value.
     *
     * @return string
     */
    public function getStandbyName()
    {
        return $this->standby_name;
    }

    /**
     * Get the [optionally formatted] temporal [standby_start] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getStandbyStart($format = NULL)
    {
        if ($format === null) {
            return $this->standby_start;
        } else {
            return $this->standby_start instanceof \DateTimeInterface ? $this->standby_start->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [standby_end] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getStandbyEnd($format = NULL)
    {
        if ($format === null) {
            return $this->standby_end;
        } else {
            return $this->standby_end instanceof \DateTimeInterface ? $this->standby_end->format($format) : null;
        }
    }

    /**
     * Get the [oncall_name] column value.
     *
     * @return string
     */
    public function getOncallName()
    {
        return $this->oncall_name;
    }

    /**
     * Get the [optionally formatted] temporal [oncall_start] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getOncallStart($format = NULL)
    {
        if ($format === null) {
            return $this->oncall_start;
        } else {
            return $this->oncall_start instanceof \DateTimeInterface ? $this->oncall_start->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [oncall_end] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getOncallEnd($format = NULL)
    {
        if ($format === null) {
            return $this->oncall_end;
        } else {
            return $this->oncall_end instanceof \DateTimeInterface ? $this->oncall_end->format($format) : null;
        }
    }

    /**
     * Get the [op_room] column value.
     *
     * @return string
     */
    public function getOpRoom()
    {
        return $this->op_room;
    }

    /**
     * Get the [diagnosis_therapy] column value.
     *
     * @return string
     */
    public function getDiagnosisTherapy()
    {
        return $this->diagnosis_therapy;
    }

    /**
     * Get the [encoding] column value.
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [history] column value.
     *
     * @return string
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Get the [modify_id] column value.
     *
     * @return string
     */
    public function getModifyId()
    {
        return $this->modify_id;
    }

    /**
     * Get the [optionally formatted] temporal [modify_time] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getModifyTime($format = NULL)
    {
        if ($format === null) {
            return $this->modify_time;
        } else {
            return $this->modify_time instanceof \DateTimeInterface ? $this->modify_time->format($format) : null;
        }
    }

    /**
     * Get the [create_id] column value.
     *
     * @return string
     */
    public function getCreateId()
    {
        return $this->create_id;
    }

    /**
     * Get the [optionally formatted] temporal [create_time] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreateTime($format = NULL)
    {
        if ($format === null) {
            return $this->create_time;
        } else {
            return $this->create_time instanceof \DateTimeInterface ? $this->create_time->format($format) : null;
        }
    }

    /**
     * Set the value of [report_nr] column.
     *
     * @param int $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setReportNr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->report_nr !== $v) {
            $this->report_nr = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_REPORT_NR] = true;
        }

        return $this;
    } // setReportNr()

    /**
     * Set the value of [dept] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setDept($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dept !== $v) {
            $this->dept = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_DEPT] = true;
        }

        return $this;
    } // setDept()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            if ( ($dt != $this->date) // normalized values don't match
                || ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
                 ) {
                $this->date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setDate()

    /**
     * Set the value of [standby_name] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setStandbyName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->standby_name !== $v) {
            $this->standby_name = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_STANDBY_NAME] = true;
        }

        return $this;
    } // setStandbyName()

    /**
     * Sets the value of [standby_start] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setStandbyStart($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->standby_start !== null || $dt !== null) {
            if ( ($dt != $this->standby_start) // normalized values don't match
                || ($dt->format('H:i:s.u') === '00:00:00.000000') // or the entered value matches the default
                 ) {
                $this->standby_start = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_STANDBY_START] = true;
            }
        } // if either are not null

        return $this;
    } // setStandbyStart()

    /**
     * Sets the value of [standby_end] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setStandbyEnd($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->standby_end !== null || $dt !== null) {
            if ( ($dt != $this->standby_end) // normalized values don't match
                || ($dt->format('H:i:s.u') === '00:00:00.000000') // or the entered value matches the default
                 ) {
                $this->standby_end = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_STANDBY_END] = true;
            }
        } // if either are not null

        return $this;
    } // setStandbyEnd()

    /**
     * Set the value of [oncall_name] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setOncallName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->oncall_name !== $v) {
            $this->oncall_name = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_ONCALL_NAME] = true;
        }

        return $this;
    } // setOncallName()

    /**
     * Sets the value of [oncall_start] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setOncallStart($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->oncall_start !== null || $dt !== null) {
            if ( ($dt != $this->oncall_start) // normalized values don't match
                || ($dt->format('H:i:s.u') === '00:00:00.000000') // or the entered value matches the default
                 ) {
                $this->oncall_start = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_ONCALL_START] = true;
            }
        } // if either are not null

        return $this;
    } // setOncallStart()

    /**
     * Sets the value of [oncall_end] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setOncallEnd($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->oncall_end !== null || $dt !== null) {
            if ( ($dt != $this->oncall_end) // normalized values don't match
                || ($dt->format('H:i:s.u') === '00:00:00.000000') // or the entered value matches the default
                 ) {
                $this->oncall_end = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_ONCALL_END] = true;
            }
        } // if either are not null

        return $this;
    } // setOncallEnd()

    /**
     * Set the value of [op_room] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setOpRoom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->op_room !== $v) {
            $this->op_room = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_OP_ROOM] = true;
        }

        return $this;
    } // setOpRoom()

    /**
     * Set the value of [diagnosis_therapy] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setDiagnosisTherapy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->diagnosis_therapy !== $v) {
            $this->diagnosis_therapy = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_DIAGNOSIS_THERAPY] = true;
        }

        return $this;
    } // setDiagnosisTherapy()

    /**
     * Set the value of [encoding] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setEncoding($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->encoding !== $v) {
            $this->encoding = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_ENCODING] = true;
        }

        return $this;
    } // setEncoding()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [history] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setHistory($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->history !== $v) {
            $this->history = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_HISTORY] = true;
        }

        return $this;
    } // setHistory()

    /**
     * Set the value of [modify_id] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setModifyId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->modify_id !== $v) {
            $this->modify_id = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_MODIFY_ID] = true;
        }

        return $this;
    } // setModifyId()

    /**
     * Sets the value of [modify_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setModifyTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modify_time !== null || $dt !== null) {
            if ($this->modify_time === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->modify_time->format("Y-m-d H:i:s.u")) {
                $this->modify_time = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_MODIFY_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setModifyTime()

    /**
     * Set the value of [create_id] column.
     *
     * @param string $v new value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setCreateId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->create_id !== $v) {
            $this->create_id = $v;
            $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_CREATE_ID] = true;
        }

        return $this;
    } // setCreateId()

    /**
     * Sets the value of [create_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object (for fluent API support)
     */
    public function setCreateTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_time !== null || $dt !== null) {
            if ( ($dt != $this->create_time) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s.u') === NULL) // or the entered value matches the default
                 ) {
                $this->create_time = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_CREATE_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setCreateTime()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->dept !== '') {
                return false;
            }

            if ($this->date && $this->date->format('Y-m-d') !== NULL) {
                return false;
            }

            if ($this->standby_name !== '') {
                return false;
            }

            if ($this->standby_start && $this->standby_start->format('H:i:s.u') !== '00:00:00.000000') {
                return false;
            }

            if ($this->standby_end && $this->standby_end->format('H:i:s.u') !== '00:00:00.000000') {
                return false;
            }

            if ($this->oncall_name !== '') {
                return false;
            }

            if ($this->oncall_start && $this->oncall_start->format('H:i:s.u') !== '00:00:00.000000') {
                return false;
            }

            if ($this->oncall_end && $this->oncall_end->format('H:i:s.u') !== '00:00:00.000000') {
                return false;
            }

            if ($this->op_room !== '') {
                return false;
            }

            if ($this->status !== '') {
                return false;
            }

            if ($this->modify_id !== '') {
                return false;
            }

            if ($this->create_id !== '') {
                return false;
            }

            if ($this->create_time && $this->create_time->format('Y-m-d H:i:s.u') !== NULL) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('ReportNr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->report_nr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('Dept', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dept = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('StandbyName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->standby_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('StandbyStart', TableMap::TYPE_PHPNAME, $indexType)];
            $this->standby_start = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('StandbyEnd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->standby_end = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('OncallName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->oncall_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('OncallStart', TableMap::TYPE_PHPNAME, $indexType)];
            $this->oncall_start = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('OncallEnd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->oncall_end = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('OpRoom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->op_room = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('DiagnosisTherapy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->diagnosis_therapy = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('Encoding', TableMap::TYPE_PHPNAME, $indexType)];
            $this->encoding = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('History', TableMap::TYPE_PHPNAME, $indexType)];
            $this->history = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('ModifyId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->modify_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('ModifyTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->modify_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('CreateId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->create_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CareStandbyDutyReportTableMap::translateFieldName('CreateTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->create_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 18; // 18 = CareStandbyDutyReportTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CareMd\\CareMd\\CareStandbyDutyReport'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CareStandbyDutyReportTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCareStandbyDutyReportQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CareStandbyDutyReport::setDeleted()
     * @see CareStandbyDutyReport::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareStandbyDutyReportTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCareStandbyDutyReportQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareStandbyDutyReportTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CareStandbyDutyReportTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CareStandbyDutyReportTableMap::COL_REPORT_NR] = true;
        if (null !== $this->report_nr) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CareStandbyDutyReportTableMap::COL_REPORT_NR . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_REPORT_NR)) {
            $modifiedColumns[':p' . $index++]  = 'report_nr';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_DEPT)) {
            $modifiedColumns[':p' . $index++]  = 'dept';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_STANDBY_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'standby_name';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_STANDBY_START)) {
            $modifiedColumns[':p' . $index++]  = 'standby_start';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_STANDBY_END)) {
            $modifiedColumns[':p' . $index++]  = 'standby_end';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_ONCALL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'oncall_name';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_ONCALL_START)) {
            $modifiedColumns[':p' . $index++]  = 'oncall_start';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_ONCALL_END)) {
            $modifiedColumns[':p' . $index++]  = 'oncall_end';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_OP_ROOM)) {
            $modifiedColumns[':p' . $index++]  = 'op_room';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_DIAGNOSIS_THERAPY)) {
            $modifiedColumns[':p' . $index++]  = 'diagnosis_therapy';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_ENCODING)) {
            $modifiedColumns[':p' . $index++]  = 'encoding';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_HISTORY)) {
            $modifiedColumns[':p' . $index++]  = 'history';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_MODIFY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'modify_id';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_MODIFY_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'modify_time';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_CREATE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'create_id';
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_CREATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'create_time';
        }

        $sql = sprintf(
            'INSERT INTO care_standby_duty_report (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'report_nr':
                        $stmt->bindValue($identifier, $this->report_nr, PDO::PARAM_INT);
                        break;
                    case 'dept':
                        $stmt->bindValue($identifier, $this->dept, PDO::PARAM_STR);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date ? $this->date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'standby_name':
                        $stmt->bindValue($identifier, $this->standby_name, PDO::PARAM_STR);
                        break;
                    case 'standby_start':
                        $stmt->bindValue($identifier, $this->standby_start ? $this->standby_start->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'standby_end':
                        $stmt->bindValue($identifier, $this->standby_end ? $this->standby_end->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'oncall_name':
                        $stmt->bindValue($identifier, $this->oncall_name, PDO::PARAM_STR);
                        break;
                    case 'oncall_start':
                        $stmt->bindValue($identifier, $this->oncall_start ? $this->oncall_start->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'oncall_end':
                        $stmt->bindValue($identifier, $this->oncall_end ? $this->oncall_end->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'op_room':
                        $stmt->bindValue($identifier, $this->op_room, PDO::PARAM_STR);
                        break;
                    case 'diagnosis_therapy':
                        $stmt->bindValue($identifier, $this->diagnosis_therapy, PDO::PARAM_STR);
                        break;
                    case 'encoding':
                        $stmt->bindValue($identifier, $this->encoding, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'history':
                        $stmt->bindValue($identifier, $this->history, PDO::PARAM_STR);
                        break;
                    case 'modify_id':
                        $stmt->bindValue($identifier, $this->modify_id, PDO::PARAM_STR);
                        break;
                    case 'modify_time':
                        $stmt->bindValue($identifier, $this->modify_time ? $this->modify_time->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'create_id':
                        $stmt->bindValue($identifier, $this->create_id, PDO::PARAM_STR);
                        break;
                    case 'create_time':
                        $stmt->bindValue($identifier, $this->create_time ? $this->create_time->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setReportNr($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CareStandbyDutyReportTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getReportNr();
                break;
            case 1:
                return $this->getDept();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getStandbyName();
                break;
            case 4:
                return $this->getStandbyStart();
                break;
            case 5:
                return $this->getStandbyEnd();
                break;
            case 6:
                return $this->getOncallName();
                break;
            case 7:
                return $this->getOncallStart();
                break;
            case 8:
                return $this->getOncallEnd();
                break;
            case 9:
                return $this->getOpRoom();
                break;
            case 10:
                return $this->getDiagnosisTherapy();
                break;
            case 11:
                return $this->getEncoding();
                break;
            case 12:
                return $this->getStatus();
                break;
            case 13:
                return $this->getHistory();
                break;
            case 14:
                return $this->getModifyId();
                break;
            case 15:
                return $this->getModifyTime();
                break;
            case 16:
                return $this->getCreateId();
                break;
            case 17:
                return $this->getCreateTime();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['CareStandbyDutyReport'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CareStandbyDutyReport'][$this->hashCode()] = true;
        $keys = CareStandbyDutyReportTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getReportNr(),
            $keys[1] => $this->getDept(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getStandbyName(),
            $keys[4] => $this->getStandbyStart(),
            $keys[5] => $this->getStandbyEnd(),
            $keys[6] => $this->getOncallName(),
            $keys[7] => $this->getOncallStart(),
            $keys[8] => $this->getOncallEnd(),
            $keys[9] => $this->getOpRoom(),
            $keys[10] => $this->getDiagnosisTherapy(),
            $keys[11] => $this->getEncoding(),
            $keys[12] => $this->getStatus(),
            $keys[13] => $this->getHistory(),
            $keys[14] => $this->getModifyId(),
            $keys[15] => $this->getModifyTime(),
            $keys[16] => $this->getCreateId(),
            $keys[17] => $this->getCreateTime(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        if ($result[$keys[5]] instanceof \DateTimeInterface) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }

        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }

        if ($result[$keys[8]] instanceof \DateTimeInterface) {
            $result[$keys[8]] = $result[$keys[8]]->format('c');
        }

        if ($result[$keys[15]] instanceof \DateTimeInterface) {
            $result[$keys[15]] = $result[$keys[15]]->format('c');
        }

        if ($result[$keys[17]] instanceof \DateTimeInterface) {
            $result[$keys[17]] = $result[$keys[17]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CareStandbyDutyReportTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setReportNr($value);
                break;
            case 1:
                $this->setDept($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setStandbyName($value);
                break;
            case 4:
                $this->setStandbyStart($value);
                break;
            case 5:
                $this->setStandbyEnd($value);
                break;
            case 6:
                $this->setOncallName($value);
                break;
            case 7:
                $this->setOncallStart($value);
                break;
            case 8:
                $this->setOncallEnd($value);
                break;
            case 9:
                $this->setOpRoom($value);
                break;
            case 10:
                $this->setDiagnosisTherapy($value);
                break;
            case 11:
                $this->setEncoding($value);
                break;
            case 12:
                $this->setStatus($value);
                break;
            case 13:
                $this->setHistory($value);
                break;
            case 14:
                $this->setModifyId($value);
                break;
            case 15:
                $this->setModifyTime($value);
                break;
            case 16:
                $this->setCreateId($value);
                break;
            case 17:
                $this->setCreateTime($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CareStandbyDutyReportTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setReportNr($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDept($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setStandbyName($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setStandbyStart($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setStandbyEnd($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setOncallName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setOncallStart($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setOncallEnd($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setOpRoom($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDiagnosisTherapy($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setEncoding($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setStatus($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setHistory($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setModifyId($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setModifyTime($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCreateId($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCreateTime($arr[$keys[17]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\CareMd\CareMd\CareStandbyDutyReport The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CareStandbyDutyReportTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_REPORT_NR)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_REPORT_NR, $this->report_nr);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_DEPT)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_DEPT, $this->dept);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_DATE)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_STANDBY_NAME)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_STANDBY_NAME, $this->standby_name);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_STANDBY_START)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_STANDBY_START, $this->standby_start);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_STANDBY_END)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_STANDBY_END, $this->standby_end);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_ONCALL_NAME)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_ONCALL_NAME, $this->oncall_name);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_ONCALL_START)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_ONCALL_START, $this->oncall_start);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_ONCALL_END)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_ONCALL_END, $this->oncall_end);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_OP_ROOM)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_OP_ROOM, $this->op_room);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_DIAGNOSIS_THERAPY)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_DIAGNOSIS_THERAPY, $this->diagnosis_therapy);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_ENCODING)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_ENCODING, $this->encoding);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_STATUS)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_HISTORY)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_HISTORY, $this->history);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_MODIFY_ID)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_MODIFY_ID, $this->modify_id);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_MODIFY_TIME)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_MODIFY_TIME, $this->modify_time);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_CREATE_ID)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_CREATE_ID, $this->create_id);
        }
        if ($this->isColumnModified(CareStandbyDutyReportTableMap::COL_CREATE_TIME)) {
            $criteria->add(CareStandbyDutyReportTableMap::COL_CREATE_TIME, $this->create_time);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCareStandbyDutyReportQuery::create();
        $criteria->add(CareStandbyDutyReportTableMap::COL_REPORT_NR, $this->report_nr);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getReportNr();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getReportNr();
    }

    /**
     * Generic method to set the primary key (report_nr column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setReportNr($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getReportNr();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CareMd\CareMd\CareStandbyDutyReport (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDept($this->getDept());
        $copyObj->setDate($this->getDate());
        $copyObj->setStandbyName($this->getStandbyName());
        $copyObj->setStandbyStart($this->getStandbyStart());
        $copyObj->setStandbyEnd($this->getStandbyEnd());
        $copyObj->setOncallName($this->getOncallName());
        $copyObj->setOncallStart($this->getOncallStart());
        $copyObj->setOncallEnd($this->getOncallEnd());
        $copyObj->setOpRoom($this->getOpRoom());
        $copyObj->setDiagnosisTherapy($this->getDiagnosisTherapy());
        $copyObj->setEncoding($this->getEncoding());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setHistory($this->getHistory());
        $copyObj->setModifyId($this->getModifyId());
        $copyObj->setModifyTime($this->getModifyTime());
        $copyObj->setCreateId($this->getCreateId());
        $copyObj->setCreateTime($this->getCreateTime());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setReportNr(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \CareMd\CareMd\CareStandbyDutyReport Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->report_nr = null;
        $this->dept = null;
        $this->date = null;
        $this->standby_name = null;
        $this->standby_start = null;
        $this->standby_end = null;
        $this->oncall_name = null;
        $this->oncall_start = null;
        $this->oncall_end = null;
        $this->op_room = null;
        $this->diagnosis_therapy = null;
        $this->encoding = null;
        $this->status = null;
        $this->history = null;
        $this->modify_id = null;
        $this->modify_time = null;
        $this->create_id = null;
        $this->create_time = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CareStandbyDutyReportTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
