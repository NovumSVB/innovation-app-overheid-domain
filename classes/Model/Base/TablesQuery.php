<?php

namespace Model\Custom\NovumOverheid\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumOverheid\Tables as ChildTables;
use Model\Custom\NovumOverheid\TablesQuery as ChildTablesQuery;
use Model\Custom\NovumOverheid\Map\TablesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tables' table.
 *
 *
 *
 * @method     ChildTablesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTablesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildTablesQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method     ChildTablesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildTablesQuery orderByForm($order = Criteria::ASC) Order by the form column
 * @method     ChildTablesQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildTablesQuery orderByRequired($order = Criteria::ASC) Order by the required column
 *
 * @method     ChildTablesQuery groupById() Group by the id column
 * @method     ChildTablesQuery groupByName() Group by the name column
 * @method     ChildTablesQuery groupByIcon() Group by the icon column
 * @method     ChildTablesQuery groupByTitle() Group by the title column
 * @method     ChildTablesQuery groupByForm() Group by the form column
 * @method     ChildTablesQuery groupByType() Group by the type column
 * @method     ChildTablesQuery groupByRequired() Group by the required column
 *
 * @method     ChildTablesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTablesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTablesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTablesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTablesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTablesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTables findOne(ConnectionInterface $con = null) Return the first ChildTables matching the query
 * @method     ChildTables findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTables matching the query, or a new ChildTables object populated from the query conditions when no match is found
 *
 * @method     ChildTables findOneById(int $id) Return the first ChildTables filtered by the id column
 * @method     ChildTables findOneByName(string $name) Return the first ChildTables filtered by the name column
 * @method     ChildTables findOneByIcon(string $icon) Return the first ChildTables filtered by the icon column
 * @method     ChildTables findOneByTitle(string $title) Return the first ChildTables filtered by the title column
 * @method     ChildTables findOneByForm(string $form) Return the first ChildTables filtered by the form column
 * @method     ChildTables findOneByType(string $type) Return the first ChildTables filtered by the type column
 * @method     ChildTables findOneByRequired(string $required) Return the first ChildTables filtered by the required column *

 * @method     ChildTables requirePk($key, ConnectionInterface $con = null) Return the ChildTables by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTables requireOne(ConnectionInterface $con = null) Return the first ChildTables matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTables requireOneById(int $id) Return the first ChildTables filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTables requireOneByName(string $name) Return the first ChildTables filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTables requireOneByIcon(string $icon) Return the first ChildTables filtered by the icon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTables requireOneByTitle(string $title) Return the first ChildTables filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTables requireOneByForm(string $form) Return the first ChildTables filtered by the form column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTables requireOneByType(string $type) Return the first ChildTables filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTables requireOneByRequired(string $required) Return the first ChildTables filtered by the required column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTables[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTables objects based on current ModelCriteria
 * @method     ChildTables[]|ObjectCollection findById(int $id) Return ChildTables objects filtered by the id column
 * @method     ChildTables[]|ObjectCollection findByName(string $name) Return ChildTables objects filtered by the name column
 * @method     ChildTables[]|ObjectCollection findByIcon(string $icon) Return ChildTables objects filtered by the icon column
 * @method     ChildTables[]|ObjectCollection findByTitle(string $title) Return ChildTables objects filtered by the title column
 * @method     ChildTables[]|ObjectCollection findByForm(string $form) Return ChildTables objects filtered by the form column
 * @method     ChildTables[]|ObjectCollection findByType(string $type) Return ChildTables objects filtered by the type column
 * @method     ChildTables[]|ObjectCollection findByRequired(string $required) Return ChildTables objects filtered by the required column
 * @method     ChildTables[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TablesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumOverheid\Base\TablesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumOverheid\\Tables', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTablesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTablesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTablesQuery) {
            return $criteria;
        }
        $query = new ChildTablesQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTables|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TablesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TablesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTables A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, icon, title, form, type, required FROM tables WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTables $obj */
            $obj = new ChildTables();
            $obj->hydrate($row);
            TablesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTables|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TablesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TablesTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TablesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TablesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TablesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TablesTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the icon column
     *
     * Example usage:
     * <code>
     * $query->filterByIcon('fooValue');   // WHERE icon = 'fooValue'
     * $query->filterByIcon('%fooValue%', Criteria::LIKE); // WHERE icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icon The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterByIcon($icon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icon)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TablesTableMap::COL_ICON, $icon, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TablesTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the form column
     *
     * Example usage:
     * <code>
     * $query->filterByForm('fooValue');   // WHERE form = 'fooValue'
     * $query->filterByForm('%fooValue%', Criteria::LIKE); // WHERE form LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterByForm($form = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TablesTableMap::COL_FORM, $form, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TablesTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the required column
     *
     * Example usage:
     * <code>
     * $query->filterByRequired('fooValue');   // WHERE required = 'fooValue'
     * $query->filterByRequired('%fooValue%', Criteria::LIKE); // WHERE required LIKE '%fooValue%'
     * </code>
     *
     * @param     string $required The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function filterByRequired($required = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($required)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TablesTableMap::COL_REQUIRED, $required, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTables $tables Object to remove from the list of results
     *
     * @return $this|ChildTablesQuery The current query, for fluid interface
     */
    public function prune($tables = null)
    {
        if ($tables) {
            $this->addUsingAlias(TablesTableMap::COL_ID, $tables->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tables table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TablesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TablesTableMap::clearInstancePool();
            TablesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TablesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TablesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TablesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TablesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TablesQuery