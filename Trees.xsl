<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:date="http://exslt.org/dates-and-times"
extension-element-prefixes="date">
<xsl:output encoding="UTF-8"/>
<xsl:key name="children" match="Person" use="@ChildOf" />
<xsl:key name="marriage" match="Person" use="@MarriedTo" />
<xsl:template match="/Tree">
<html>
	<head><link rel="stylesheet" href="../TreeStyle.css" type="text/css"/></head><body>
		<div class="tree" id="tree">
			<ul>
				<xsl:apply-templates select="Person[@ChildOf='0']"/>
			</ul>
		</div>
	</body>
</html>
</xsl:template>

<xsl:template match="Person">
    <li>
		
	    <xsl:variable name="marriage" select="key('marriage', @ID)" />
        <a href="#">
		<xsl:choose>
            <xsl:when test="@Gender = 'male'">
                <xsl:attribute name="class">male</xsl:attribute>
            </xsl:when>
            <xsl:otherwise>
                <xsl:attribute name="class">female</xsl:attribute>
            </xsl:otherwise>
        </xsl:choose>

		
	    <xsl:if test="@Death">&#10013;</xsl:if>
		<xsl:value-of select="@FirstName" />&#160;<xsl:value-of select="@LastName" /><xsl:if test="$marriage"> &#x26AD; <xsl:if test="$marriage/@Death">&#10013;</xsl:if><xsl:value-of select="$marriage/@FirstName"/>&#160;<xsl:value-of select="$marriage/@LastName"/></xsl:if>		
		
		</a>
	   <xsl:variable name="children" select="key('children', @ID)" />
        <xsl:if test="$children">
			<ul>
				<xsl:apply-templates select="$children" />
			</ul>
        </xsl:if>	
	<!--- Wenn die Person Kind des angeheirateten Partnes ist-->
		<xsl:variable name="children1" select="key('children', $marriage/@ID)" />
		<xsl:if test="$children1">
			<ul>
				<xsl:apply-templates select="$children1" />
			</ul>
		</xsl:if>
	</li>
</xsl:template>   
</xsl:stylesheet>